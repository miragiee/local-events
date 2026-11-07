<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrganizatorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="organizator-search crud-search-card">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="search-fields-row">
        <?= $form->field($model, 'id', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'ID'])->label('Поиск по ID') ?>

        <?= $form->field($model, 'title', ['options' => ['class' => 'search-field-item']])->textInput(['placeholder' => 'Наименование организатора'])->label('Поиск по наименованию') ?>
    </div>

    <div class="form-group search-actions">
        <?= Html::submitButton('Найти', ['class' => 'btn accent-btn', 'style' => 'width: 160px;']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn normal-btn', 'style' => 'width: 160px; text-align: center; text-decoration: none;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
