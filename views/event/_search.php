<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EventSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="event-search crud-search-card">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="search-fields-row">
        <?= $form->field($model, 'id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID'])->label('Поиск по ID') ?>

        <?= $form->field($model, 'title', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Название'])->label('Поиск по названию') ?>

        <?= $form->field($model, 'description', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Описание'])->label('Поиск по описанию') ?>

        <?= $form->field($model, 'start_date', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ГГГГ-ММ-ДД'])->label('Поиск по дате начала') ?>
    </div>

    <div class="form-group search-actions">
        <?= Html::submitButton('Найти', ['class' => 'btn accent-btn', 'style' => 'width: 160px;']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn normal-btn', 'style' => 'width: 160px; text-align: center; text-decoration: none;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
