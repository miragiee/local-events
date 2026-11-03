<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserApplication $model */

$this->title = 'Create User Application';
$this->params['breadcrumbs'][] = ['label' => 'User Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-application-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
