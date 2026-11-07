<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserApplicationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-application-search crud-search-card">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="search-fields-row">
        <?= $form->field($model, 'id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID'])->label('Поиск по ID') ?>

        <?= $form->field($model, 'event_id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID мероприятия'])->label('Поиск по мероприятию') ?>

        <?= $form->field($model, 'user_id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID пользователя'])->label('Поиск по пользователю') ?>

        <?= $form->field($model, 'status', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Статус'])->label('Поиск по статусу') ?>
    </div>

    <div class="form-group search-actions">
        <?= Html::submitButton('Найти', ['class' => 'btn accent-btn', 'style' => 'width: 160px;']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn normal-btn', 'style' => 'width: 160px; text-align: center; text-decoration: none;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
