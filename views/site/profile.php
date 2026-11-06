<?php

use yii\helpers\Html;

$user = Yii::$app->user->identity;

$avatarPath = ($user && !empty($user->avatar_URL)) ? $user->avatar_URL : 'web/resources/images/event-image-placeholder.jpg';
$username = ($user && !empty($user->fisrt_name)) ? $user->fisrt_name : 'Иван';
$lastname = ($user && !empty($user->last_name)) ? $user->last_name : 'Иванов';
$patronymic = ($user && !empty($user->patronymic)) ? $user->patronymic : 'Иванович';
$mail = ($user && !empty($user->email)) ? $user->email : "mail@example.com";
$phone = ($user && !empty($user->phone_number)) ? $user->phone_number : "+70000000000";
$city = ($user && !empty($user->city)) ? $user->city : "Москва";

$avatarUrl = '/' . ltrim($avatarPath, '/')

?>

<div class="container">
    <h2>Привет, <?= $username ?>!</h2>
</div>

<div class="update-user-data">
    <div class="update-avatar">
        <img src="<?= $avatarUrl ?>" alt="Ваш текущий аватар" />
        <div class="input-buttons">
            <button class="accent-btn">Сменить аватар</button>
            <button class="cancel">Удалить аватар</button>
        </div>
    </div>

    <div class="input-section">
        <div class="input-block">
            <label for="username">Фамилия</label>
            <input type="text" id="username" placeholder="<?= $lastname ?>" />
        </div>
        <div class="input-block">
            <label for="firstname">Имя</label>
            <input type="text" id="firstname" placeholder="<?= $username ?>" />
        </div>
        <div class="input-block">
            <label for="patronymic">Отчество</label>
            <input type="text" id="patronymic" placeholder="<?= $patronymic ?>" />
        </div>
        <div class="input-block">
            <label for="useremail">Почта</label>
            <input type="email" id="useremail" placeholder="<?= $mail ?>" />
        </div>
        <div class="input-block">
            <label for="userphone">Телефон</label>
            <input type="tel" id="userphone" placeholder="<?= $phone ?>" />
        </div>

        <div class="input-block">
            <label for="usercity">Город</label>
            <input type="text" id="usercity" placeholder="<?= $city ?>" />
        </div>

        <div class="input-buttons">
            <button class="accent-btn">Сохранить изменения</button>
            <button class="cancel">Отменить изменения</button>
        </div>

        <?php
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline'])
            . Html::submitButton('Выйти', ['class' => 'logout-btn'])
            . Html::endForm();

        ?>
    </div>
</div>