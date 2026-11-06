<?php

/** @var app\models\Event $event */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

$image = $event->image_URL
    ? '/' . ltrim($event->image_URL, '/')
    : '/web/resources/images/event-image-placeholder.jpg';

$dateFormatted = $event->start_date ? Yii::$app->formatter->asDate($event->start_date, 'dd.MM.yyyy')
    : '';

$shortDescription = StringHelper::truncate($event->description, 80);
?>

<div class="event-card">
    <div class="event-card-image-wrapper">
        <img class="event-card-image" src="<?= Html::encode($image) ?>"
            alt="<?= Html::encode($event->title)  ?>" />
    </div>

    <div class="event-card-data">
        <div class="primary-data">
            <div class="small-text date"><?= Html::encode($dateFormatted)  ?></div>
            <h3 class="event-name"><?= Html::encode($event->title)  ?></h3>
        </div>

        <div class="description"><?= Html::encode($shortDescription) ?></div>

        <div class="buttons">
            <button class="accent-btn event-register">Записаться</button>
            <?= Html::a('Узнать больше', Url::to(['event/view', 'id' => $event->id]), ['class' => 'normal-btn learn-about'])  ?>
        </div>

        <div class="participants">Участников: <?= (int) $event->participations  ?></div>
    </div>
</div>