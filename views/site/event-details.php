<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var app\models\Event $model */
/** @var bool $isRegistered */

$imagePath = !empty($model->image_URL)
    ? '/' . ltrim($model->image_URL, '/')
    : '/web/resources/images/event-image-placeholder.jpg';

$startDate = $model->start_date
    ? Yii::$app->formatter->asDate($model->start_date, 'dd.MM.yyyy')
    : '—';
$endDate = $model->end_date
    ? Yii::$app->formatter->asDate($model->end_date, 'dd.MM.yyyy')
    : null;
$dateRange = $endDate && $endDate !== $startDate ? "$startDate – $endDate" : $startDate;

$participations = (int) ($model->participations ?? 0);

// city — прямое поле; place — через связь (см. п.3)
$city        = $model->city ?: '—';
$placeName   = $model->place ? ($model->place->title ?? $model->place->name ?? null) : null;
$placeLabel  = $placeName ? "$city, $placeName" : $city;

$organizatorName = $model->organizator
    ? ($model->organizator->title ?? $model->organizator->name ?? '—')
    : '—';

$btnClass  = $isRegistered ? 'cancel accent-btn' : 'accent-btn';
$btnText   = $isRegistered
    ? 'Отменить запись'
    : ($model->price > 0 ? 'Записаться — ' . $model->price . ' ₽' : 'Записаться');
$btnAction = $isRegistered ? 'cancel' : 'register';
?>

<div class="container">
    <div class="event-details">
        <img style="width: 500px; height: 500px;" src="<?= Html::encode($imagePath) ?>" alt="<?= Html::encode($model->title) ?>" />

        <section class="text-data">
            <h2><?= Html::encode($model->title) ?></h2>

            <p id="description"><?= nl2br(Html::encode($model->description)) ?></p>

            <div class="event-info" id="participation">
                <p class="blue-text">Количество участников:</p>
                <p><span class="participants-count" data-event-id="<?= (int) $model->id ?>"><?= $participations ?></span></p>
            </div>

            <div class="event-info date">
                <p class="blue-text">Дата проведения:</p>
                <p><?= Html::encode($dateRange) ?></p>
            </div>

            <div class="event-info" id="place">
                <p class="blue-text">Адрес проведения:</p>
                <p><?= Html::encode($placeLabel) ?></p>
            </div>

            <div class="event-info" id="organizator">
                <p class="blue-text">Организатор:</p>
                <p><?= Html::encode($organizatorName) ?></p>
            </div>

            <div class="event-info">
                <button class="<?= $btnClass ?> event-toggle-btn"
                    data-event-id="<?= (int) $model->id ?>"
                    data-action="<?= $btnAction ?>"
                    data-default-text="<?= Html::encode($btnText) ?>"
                    data-url-register="<?= Url::to(['site/register-event']) ?>"
                    data-url-cancel="<?= Url::to(['site/cancel-event']) ?>">
                    <?= Html::encode($btnText) ?>
                </button>
            </div>
        </section>
    </div>
</div>