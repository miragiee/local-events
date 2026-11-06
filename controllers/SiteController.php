<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Event;
use app\models\UserApplication;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Event::find()->where(['>=', 'start_date', date('Y-m-d')])->orderBy(['start_date' => SORT_ASC])->limit(4);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        $registeredEventIds = [];
        if (!Yii::$app->user->isGuest) {
            $registeredEventIds = UserApplication::find()
                ->select('event_id')
                ->where(['user_id' => Yii::$app->user->id])
                ->column();
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'registeredEventIds' => $registeredEventIds,
        ]);
    }

    public function actionAllEvents()
    {
        $query = Event::find()->where(['>=', 'start_date', date('Y-m-d')])->orderBy(['start_date' => SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        $registeredEventIds = [];
        if (!Yii::$app->user->isGuest) {
            $registeredEventIds = UserApplication::find()
                ->select('event_id')
                ->where(['user_id' => Yii::$app->user->id])
                ->column();
        }

        return $this->render('all-events', [
            'dataProvider' => $dataProvider,
            'registeredEventIds' => $registeredEventIds,
        ]);
    }

    public function actionRegisterEvent()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (Yii::$app->user->isGuest) {
            return ['success' => false, 'message' => 'Для записи необходимо войти в аккаунт.'];
        }

        $eventId = Yii::$app->request->post('event_id');
        $userId = Yii::$app->user->id;

        if (!$eventId) {
            return ['success' => false, 'message' => 'Ошибка: не передан ID мероприятия.'];
        }

        $exists = UserApplication::find()
            ->where(['event_id' => $eventId, 'user_id' => $userId])
            ->exists();

        if ($exists) {
            return ['success' => false, 'message' => 'Вы уже записаны на это мероприятие.'];
        }

        $application = new UserApplication();
        $application->event_id = $eventId;
        $application->user_id = $userId;
        $application->status = 'Оформлено';

        if ($application->save()) {
            $event = Event::findOne($eventId);
            $newCount = $event ? $event->participations + 1 : 0;
            if ($event) {
                $event->updateCounters(['participations' => 1]);
            }
            return ['success' => true, 'message' => 'Вы успешно записались!', 'count' => $newCount];
        }

        return ['success' => false, 'message' => 'Произошла ошибка при сохранении.'];
    }

    public function actionCancelEvent()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (Yii::$app->user->isGuest) {
            return ['success' => false, 'message' => 'Необходимо войти.'];
        }

        $eventId = Yii::$app->request->post('event_id');
        $userId = Yii::$app->user->id;

        $application = UserApplication::findOne(['event_id' => $eventId, 'user_id' => $userId]);

        if ($application && $application->delete()) {
            $event = Event::findOne($eventId);
            $newCount = $event && $event->participations > 0 ? $event->participations - 1 : 0;
            if ($event && $event->participations > 0) {
                $event->updateCounters(['participations' => -1]);
            }
            return ['success' => true, 'message' => 'Запись отменена.', 'count' => $newCount];
        }

        return ['success' => false, 'message' => 'Запись не найдена.'];
    }

    public function actionEventDetails()
    {
        return $this->render('event-details');
    }

    public function actionMyEvents()
    {
        return $this->render('my-events');
    }

    public function actionProfile()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        /** @var \app\models\User $model */
        $model = Yii::$app->user->identity;

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->post('delete_avatar') === '1') {
                $model->avatar_URL = null;
            }

            $file = \yii\web\UploadedFile::getInstance($model, 'avatarFile');
            if ($file) {
                $uploadDir = Yii::getAlias('@webroot/resources/images/avatars/');
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = uniqid() . '.' . $file->extension;
                if ($file->saveAs($uploadDir . $fileName)) {
                    $model->avatar_URL = 'web/resources/images/avatars/' . $fileName;
                }
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Профиль успешно обновлен!');
                return $this->refresh();
            }
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionRegisterStep1()
    {
        return $this->render('register-1');
    }

    public function actionRegisterStep2()
    {
        return $this->render('register-2');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
