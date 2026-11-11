<?php

use app\models\UserApplication;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление записями на мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crud-page container">

    <div class="crud-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="crud-actions">
            <?php if (!Yii::$app->user->isGuest && (int)Yii::$app->user->identity->role_id === 2): ?>
                <?= Html::a('← Панель управления', Url::to('@web/admin/panel'), ['class' => 'btn normal-btn admin-panel-back-btn']) ?>
            <?php endif; ?>
            <?= Html::a('+ Создать', ['create'], ['class' => 'btn accent-btn crud-accent-btn']) ?>
        </div>
    </div>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <div class="crud-card">
        <div class="crud-card-header">
            <h3 style="margin: 0; font-size: 18px;">Список записей</h3>
            <button type="button" class="btn normal-btn table-collapse-btn" data-target="#crudTableWrapper" aria-expanded="true">
                <span class="btn-text">Свернуть таблицу</span> <span class="btn-icon">▲</span>
            </button>
        </div>

        <div id="crudTableWrapper" class="crud-table-wrapper collapse show">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '<div class="crud-summary">Показано <b>{begin}-{end}</b> из <b>{totalCount}</b> записей</div>',
                'tableOptions' => ['class' => 'table crud-table'],
                'pager' => [
                    'class' => \yii\widgets\LinkPager::class,
                    'options' => ['class' => 'pagination-custom'],
                    'linkOptions' => ['class' => 'page-link'],
                    'prevPageLabel' => '<',
                    'nextPageLabel' => '>',
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => '№',
                        'headerOptions' => ['style' => 'width: 50px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style' => 'width: 70px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center; font-weight: bold;'],
                    ],
                    [
                        'attribute' => 'event_id',
                        'label' => 'Мероприятие',
                        'headerOptions' => ['style' => 'width: 35%;'],
                        'value' => function ($model) {
                            return $model->event ? $model->event->title : $model->event_id;
                        },
                    ],
                    [
                        'attribute' => 'user_id',
                        'label' => 'Пользователь',
                        'headerOptions' => ['style' => 'width: 28%;'],
                        'value' => function ($model) {
                            return $model->user ? ($model->user->username . ($model->user->fisrt_name ? ' (' . $model->user->fisrt_name . ')' : '')) : $model->user_id;
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'headerOptions' => ['style' => 'width: 130px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'header' => 'Действия',
                        'headerOptions' => ['style' => 'width: 100px; text-align: center;'],
                        'contentOptions' => ['class' => 'action-column'],
                        'urlCreator' => function ($action, UserApplication $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
