<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var app\models\User $model */

$avatarPath = ($model && !empty($model->avatar_URL))
    ? $model->avatar_URL
    : 'web/resources/images/event-image-placeholder.jpg';
$avatarUrl = '/' . ltrim($avatarPath, '/');
$defaultAvatarUrl = '/web/resources/images/event-image-placeholder.jpg';

$this->title = 'Мой профиль';
?>

<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <h2>Привет, <?= Html::encode($model->fisrt_name ?: $model->username) ?>!</h2>
</div>

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
        <img id="profile-avatar-img"
            src="<?= $avatarUrl ?>"
            data-default="<?= $defaultAvatarUrl ?>"
            alt="Ваш текущий аватар" />

        <div class="input-buttons">
            <input type="hidden" name="delete_avatar" id="delete-avatar-flag" value="0">

            <?= Html::activeFileInput($model, 'avatarFile', [
                'id' => 'avatar-upload',
                'style' => 'display:none;',
                'accept' => 'image/*'
            ]) ?>

            <label for="avatar-upload" class="upload-avatar-btn" style="text-align: center; cursor: pointer; margin: 0;">
                Сменить аватар
            </label>

            <button type="button" class="cancel" id="delete-avatar-btn">Удалить аватар</button>
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
            <a href="<?= Url::to(['site/profile']) ?>" class="cancel" style="text-align: center; text-decoration: none; padding: 12px 16px; border-radius: 8px; box-sizing: border-box;">Отменить изменения</a>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="logout-wrapper" style="margin-top: 20px; width: 100%;">
            <?php if (!Yii::$app->user->isGuest && (int)$model->role_id === 2): ?>
                <a href="<?= Url::to('@web/admin/panel') ?>" class="admin-button" style="width: 100%; height: auto; padding: 12px 16px; margin-bottom: 12px; font-weight: 600; text-align: center; box-sizing: border-box;">
                    Панель администратора
                </a>
            <?php endif; ?>

            <?= Html::beginForm(['/site/logout'], 'post') ?>
            <?= Html::submitButton('Выйти из аккаунта', ['class' => 'logout-btn', 'style' => 'width: 100%; padding: 12px 16px; box-sizing: border-box;']) ?>
            <?= Html::endForm() ?>
        </div>
    </div>
</div>
