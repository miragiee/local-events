<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search crud-search-card">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="search-fields-row">
        <?= $form->field($model, 'id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID'])->label('Поиск по ID') ?>

        <?= $form->field($model, 'username', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Логин'])->label('Поиск по логину') ?>

        <?= $form->field($model, 'email', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Почта'])->label('Поиск по почте') ?>

        <?= $form->field($model, 'phone_number', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Телефон'])->label('Поиск по телефону') ?>
    </div>

    <div class="form-group search-actions">
        <?= Html::submitButton('Найти', ['class' => 'btn accent-btn', 'style' => 'width: 160px;']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn normal-btn', 'style' => 'width: 160px; text-align: center; text-decoration: none;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
