<?php

/** @var app\models\Event $event */
/** @var array $registeredEventIds */
/** @var bool $isPast */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

$isPast = isset($isPast) ? $isPast : false;
$image = $event->image_URL
    ? '/' . ltrim($event->image_URL, '/')
    : '/web/resources/images/event-image-placeholder.jpg';

$dateFormatted = $event->start_date ? Yii::$app->formatter->asDate($event->start_date, 'dd.MM.yyyy')
    : '';

$shortDescription = StringHelper::truncate($event->description, 80);
$isRegistered = isset($registeredEventIds) && in_array($event->id, $registeredEventIds);

if ($isRegistered) {
    $btnClass = 'cancel accent-btn';
    $btnText = 'Отменить';
    $btnAction = 'cancel';
} else {
    $btnClass = 'accent-btn';
    $btnText = ($event->price > 0) ? $event->price . ' ₽' : 'Записаться';
    $btnAction = 'register';
}
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
            <?php if (!$isPast): ?>
                <button class="<?= $btnClass ?> event-toggle-btn"
                    data-event-id="<?= $event->id ?>"
                    data-action="<?= $btnAction ?>"
                    data-default-text="<?= $btnText ?>"
                    data-url-register="<?= Url::to(['site/register-event']) ?>"
                    data-url-cancel="<?= Url::to(['site/cancel-event']) ?>">
                    <?= $btnText ?>
                </button>
            <?php endif; ?>

            <?= Html::a('Узнать больше', Url::to(['event/view', 'id' => $event->id]), ['class' => 'btn normal-btn learn-about'])  ?>
        </div>

        <div class="participants">
            Участников: <span class="participants-count" data-event-id="<?= $event->id ?>"><?= (int) $event->participations ?></span>
        </div>
    </div>
</div>