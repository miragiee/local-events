<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlaceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="place-search crud-search-card">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="search-fields-row">
        <?= $form->field($model, 'id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID'])->label('Поиск по ID') ?>

        <?= $form->field($model, 'title', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Название площадки'])->label('Поиск по названию') ?>

        <?= $form->field($model, 'address', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Адрес'])->label('Поиск по адресу') ?>
    </div>

    <div class="form-group search-actions">
        <?= Html::submitButton('Найти', ['class' => 'btn accent-btn', 'style' => 'width: 160px;']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn normal-btn', 'style' => 'width: 160px; text-align: center; text-decoration: none;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
