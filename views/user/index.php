<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление пользователями';
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
            <h3 style="margin: 0; font-size: 18px;">Список пользователей</h3>
            <button type="button" class="btn normal-btn table-collapse-btn" data-target="#crudTableWrapper" aria-expanded="true">
                <span class="btn-text">Свернуть таблицу</span> <span class="btn-icon">▲</span>
            </button>
        </div>

        <div id="crudTableWrapper" class="crud-table-wrapper collapse show">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '<div class="crud-summary">Показано <b>{begin}-{end}</b> из <b>{totalCount}</b> пользователей</div>',
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
                        'headerOptions' => ['style' => 'width: 45px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style' => 'width: 60px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center; font-weight: bold;'],
                    ],
                    [
                        'attribute' => 'username',
                        'label' => 'Логин',
                        'headerOptions' => ['style' => 'width: 15%;'],
                    ],
                    [
                        'attribute' => 'role_id',
                        'label' => 'Роль',
                        'value' => function ($model) {
                            return $model->role ? $model->role->title : $model->role_id;
                        },
                        'headerOptions' => ['style' => 'width: 110px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                        'attribute' => 'email',
                        'format' => 'email',
                        'label' => 'Почта',
                        'headerOptions' => ['style' => 'width: 20%;'],
                    ],
                    [
                        'attribute' => 'fisrt_name',
                        'label' => 'Имя',
                        'headerOptions' => ['style' => 'width: 13%;'],
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                        'headerOptions' => ['style' => 'width: 13%;'],
                    ],
                    [
                        'attribute' => 'phone_number',
                        'label' => 'Телефон',
                        'headerOptions' => ['style' => 'width: 14%;'],
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'header' => 'Действия',
                        'headerOptions' => ['style' => 'width: 100px; text-align: center;'],
                        'contentOptions' => ['class' => 'action-column'],
                        'urlCreator' => function ($action, User $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
