<?php

use yii\helpers\Url;

$user = Yii::$app->user->identity;

$avatarPath = ($user && !empty($user->avatar_URL)) ? $user->avatar_URL : 'web/resources/images/event-image-placeholder.jpg';
$avatarUrl = '/' . ltrim($avatarPath, '/');
?>

<header>
    <div class="container">
        <a href="<?= Url::to(['site/index']) ?>" class="name">Локаливент</a>
        <nav>
            <a href="<?= Url::to(['site/index']) ?>">Главная</a>
            <a href="<?= Url::to(['site/all-events']) ?>">Мероприятия</a>
            <a href="<?= Url::to(['site/my-events']) ?>">Мои записи</a>

            <?php if (!Yii::$app->user->isGuest && (int)$user->role_id === 2): ?>
                <a href="<?= Url::to(['admin/panel']) ?>" class="admin-nav-btn">Панель управления</a>
            <?php endif; ?>

            <?php if (Yii::$app->user->isGuest): ?>
                <a href="<?= Url::to(['site/login']) ?>" class="login-btn">Войти</a>
            <?php else: ?>
                <a href="<?= Url::to(['site/profile']) ?>">
                    <img src="<?= $avatarUrl ?>" alt="Профиль" />
                </a>
            <?php endif; ?>
        </nav>
        <div class="mobile-menu">
            <button class="menu-toggle" aria-label="Открыть меню">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav>
                <a href="<?= Url::to(['site/index']) ?>">Главная</a>
                <a href="<?= Url::to(['site/all-events']) ?>">Мероприятия</a>
                <a href="<?= Url::to(['site/my-events']) ?>">Мои записи</a>

                <?php if (!Yii::$app->user->isGuest && (int)$user->role_id === 2): ?>
                    <a href="<?= Url::to(['admin/panel']) ?>">Панель управления</a>
                <?php endif; ?>

                <?php if (Yii::$app->user->isGuest): ?>
                    <a href="<?= Url::to(['site/login']) ?>">Войти</a>
                <?php else: ?>
                    <a href="<?= Url::to(['site/profile']) ?>" aria-label="Профиль">
                        <img src="<?= Url::to('@web/resources/images/sakura-art.png') ?>" alt="" />
                        <span>Профиль</span>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>
