<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->label('Поиск по ID') ?>

    <?= $form->field($model, 'title')->label('Поиск по названию') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn accent-btn', 'style' => 'width: 200px;']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn normal-btn', 'style' => 'width: 200px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>