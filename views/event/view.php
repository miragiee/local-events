<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Event $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title' => 'Название мероприятия',
            'description' => 'Описание мероприятия',
            'participations' => 'Количество участников',
            'start_date' => 'Дата начала мероприятия',
            'end_date' => 'Дата конца мероприятия',
            'organizator_id' => 'Организатор',
            'place_id' => 'Площадка проведения мероприятия',
            'image_URL:url' => 'Картинка мероприятия'
        ],
    ]) ?>

</div>