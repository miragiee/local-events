<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserApplication $model */

$this->title = 'Update User Application: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-application-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
