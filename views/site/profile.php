<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var app\models\User $model */

// Учитываем путь к картинкам как /web/resources/...
$avatarPath = ($model && !empty($model->avatar_URL))
    ? $model->avatar_URL
    : 'web/resources/images/event-image-placeholder.jpg';
$avatarUrl = '/' . ltrim($avatarPath, '/');

$this->title = 'Мой профиль';
?>

<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <h2>Привет, <?= Html::encode($model->fisrt_name ?: $model->username) ?>!</h2>


    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'options' => ['class' => 'input-block'],
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => ''],
        ],
    ]); ?>

    <div class="update-user-data">
        <div class="update-avatar">
            <img src="<?= $avatarUrl ?>" alt="Ваш текущий аватар" />

            <div class="input-buttons">
                <!-- Скрытый инпут для загрузки файла -->
                <?= Html::activeFileInput($model, 'avatarFile', [
                    'id' => 'avatar-upload',
                    'style' => 'display:none;',
                    'accept' => 'image/*'
                ]) ?>

                <label for="avatar-upload" class="upload-avatar-btn">
                    Сменить аватар
                </label>

                <button type="button" class="cancel">Удалить аватар</button>
            </div>
        </div>

        <div class="input-section">
            <?= $form->field($model, 'last_name')->textInput(['class' => '', 'placeholder' => 'Иванов'])->label('Фамилия') ?>

            <?= $form->field($model, 'fisrt_name')->textInput(['class' => '', 'placeholder' => 'Иван'])->label('Имя') ?>

            <?= $form->field($model, 'patronymic')->textInput(['class' => '', 'placeholder' => 'Иванович'])->label('Отчество') ?>

            <?= $form->field($model, 'email')->textInput(['class' => '', 'type' => 'email', 'placeholder' => 'mail@example.com'])->label('Почта') ?>

            <?= $form->field($model, 'phone_number')->textInput(['class' => '', 'type' => 'tel', 'placeholder' => '+7 (999) 000-00-00'])->label('Телефон') ?>

            <?= $form->field($model, 'city')->textInput(['class' => '', 'placeholder' => 'Москва'])->label('Город') ?>

            <div class="input-buttons">
                <?= Html::submitButton('Сохранить изменения', ['class' => 'accent-btn']) ?>
                <a href="<?= Url::to(['site/profile']) ?>" class="cancel" ">Отменить изменения</a>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="logout-wrapper" style="margin-top: 20px; width: 100%;">
                <?= Html::beginForm(['/site/logout'], 'post') ?>
                <?= Html::submitButton('Выйти из аккаунта', ['class' => 'logout-btn']) ?>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>
</div>