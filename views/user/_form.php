<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="site-register">
    <h2>РЕГИСТРАЦИЯ</h2>
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
    <div class="form-group" id="user-input-1">


        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

        <?= Html::button('Далее', ['class' => 'big-login-btn', 'id' => 'continue-btn', 'type' => 'button']) ?>

        <div class="question-link">
            <div>Есть аккаунт?</div>
            <a href="<?= Url::to('@web/site/login') ?>">Войти</a>
        </div>
    </div>

    <div class="form-group" id="user-input-2" hidden>

        <?= $form->field($model, 'fisrt_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

        <!-- <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?> -->

        <!-- <?= $form->field($model, 'avatar_URL')->textInput(['maxlength' => true]) ?> -->

        <?= Html::submitButton('Сохранить', ['class' => 'big-login-btn', 'id' => 'register-btn']) ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>