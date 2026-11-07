<?php

namespace app\models;

use Override;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role_id
 * @property string $username
 * @property string|null $email
 * @property string $password
 * @property string|null $fisrt_name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string|null $phone_number
 * @property string|null $city
 * @property string|null $avatar_URL
 *
 * @property Role $role
 * @property UserApplication[] $userApplications
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_repeat;
    public $avatarFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'fisrt_name', 'last_name', 'patronymic', 'phone_number', 'city', 'avatar_URL'], 'default', 'value' => null],
            [['role_id'], 'default', 'value' => 1],
            [['role_id'], 'integer'],
            [['username', 'password'], 'required'],
            [['username', 'email', 'password', 'fisrt_name', 'last_name', 'patronymic', 'phone_number', 'city', 'avatar_URL'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['phone_number'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],


            [['password_repeat'], 'required', 'on' => 'register'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.', 'on' => 'register'],

            [['avatarFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Роль',
            'username' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'fisrt_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone_number' => 'Номер телефона',
            'city' => 'Город',
            'avatar_URL' => 'Путь к аватару',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    /**
     * Gets query for [[UserApplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserApplications()
    {
        return $this->hasMany(UserApplication::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(["username" => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */

    #[Override]
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert || !empty($this->password_repeat)) {
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            } elseif (!$insert) {
                $this->password = $this->getOldAttribute('password');
            }
            return true;
        }
        return false;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
