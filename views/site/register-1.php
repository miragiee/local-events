<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

?>

<section class="center-container">
    <h2>Регистрация</h2>
    <div class="input-section">
        <div class="input-block">
            <label for="useremail">Почта</label>
            <input type="email" id="useremail" placeholder="mail@example.com" />
        </div>

        <div class="input-block">
            <label for="password">Пароль</label>
            <input type="password" id="password" placeholder="Пароль" />
        </div>

        <div class="input-block">
            <label for="password-repeat">Повторите парольь</label>
            <input type="password" id="password-repeat" placeholder="Пароль" />
        </div>

        <div class="input-buttons">
            <button class="accent-btn">Далее</button>
        </div>

        <div class="question-link">
            <div>Есть аккаунт?</div>
            <a href="/pages/login.html">Войти </a>
        </div>
    </div>
</section>