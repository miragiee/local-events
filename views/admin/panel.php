<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container" style="gap: 20px;">

    <a class="btn accent-btn" href="<?= Url::to('@web/user/index') ?>">Список пользователей</a>
    <a class="btn accent-btn" href="<?= Url::to('@web/event/index') ?>">Список мероприятий</a>
    <a class="btn accent-btn" href="<?= Url::to('@web/organizator/index') ?>">Список организаторов</a>
    <a class="btn accent-btn" href="<?= Url::to('@web/place/index') ?>">Список площадок</a>
    <a class="btn accent-btn" href="<?= Url::to('@web/event-type/index') ?>">Список категорий</a>
    <a class="btn accent-btn" href="<?= Url::to('@web/user-application/index') ?>">Список заявок пользователей</a>

</div>