<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Панель администратора';
?>

<div class="container admin-container" style="gap: 20px;">
    <h2><?= Html::encode($this->title) ?></h2>

    <a class="admin-button" href="<?= Url::to('@web/user/index') ?>">Управление пользователями</a>
    <a class="admin-button" href="<?= Url::to('@web/event/index') ?>">Управление мероприятиями</a>
    <a class="admin-button" href="<?= Url::to('@web/organizator/index') ?>">Управление организаторами</a>
    <a class="admin-button" href="<?= Url::to('@web/place/index') ?>">Управление площадками</a>
    <a class="admin-button" href="<?= Url::to('@web/event-type/index') ?>">Управление категориями</a>
    <a class="admin-button" href="<?= Url::to('@web/user-application/index') ?>">Управление записями на мероприятия</a>
</div>
