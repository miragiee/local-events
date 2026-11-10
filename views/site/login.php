<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>ВОЙТИ</h2>

    <?php $form = ActiveForm::begin([
        'id' => 'login-input-block',
        'fieldConfig' => [
            'template' => "{label}\n\n{input}\n{error}",
            'options' => ['class' => 'input-block'],
            'labelOptions' => [],
            'inputOptions' => [],
            'errorOptions' => ['class' => 'error-message'],
        ],
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Логин") ?>

        <?= $form->field($model, 'password')->passwordInput()->label("Пароль") ?>
        <?= Html::submitButton('Войти', ['class' => 'big-login-btn', 'name' => 'login-button']) ?>
    </div>

    <div class="register-link">
        <p>Нет аккаунта? </p>
        <a href="<?= Url::to('@web/user/create') ?>">Зарегистрироваться</a>

    </div>

    <?php ActiveForm::end(); ?>
</div>