<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\bootstrap4\Carousel;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="container">
    <?=
    Carousel::widget([

        'items' => [
            [
                'content' => Html::img(Url::to('@web/resources/images/syrneke.jpg'), ['alt' => 'Слайд 1', 'class'   => 'd-block w-100']),
                'options' => ['class' => 'carousel-item'],
            ],
            [
                'content' => Html::img(Url::to('@web/resources/images/omon.png'), ['alt' => 'Слайд 2', 'class'   => 'd-block w-100']),
                'options' => ['class' => 'carousel-item'],
            ],
            [
                'content' => Html::img(Url::to('@web/resources/images/musya.jpg'), ['alt' => 'Слайд 3', 'class'   => 'd-block w-100']),
                'options' => ['class' => 'carousel-item'],
            ],
        ],

        'controls' => [
            '<span class="carousel-control-prev-icon" aria-hidden="true"></span><span   class="sr-only">Назад</span>',
            '<span class="carousel-control-next-icon" aria-hidden="true"></span><span   class="sr-only">Вперёд</span>'
        ],
        'clientOptions' => [
            'interval' => 3000,
            'ride' => 'carousel',
            'wrap' => true,
        ],
    ]);
    ?>
    <section class="recommended-events">
        <h2>Рекомендуемые мероприятия</h2>
        <div class="event-cards" aria-label="Список мероприятий">

            <?php if (empty($dataProvider->getModels())):  ?>
                <p>Мероприятий нет</p>
            <?php else: ?>
                <?php foreach ($dataProvider->getModels() as $event):  ?>
                    <?= $this->render('/layouts/_card', ['event' => $event]) ?>
                <?php endforeach; ?>
            <?php endif;  ?>
        </div>

        <div class="paganation-wrapper">
            <?=
            \yii\widgets\LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination-custom'],
                'linkOptions' => ['class' => 'page-link'],
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
            ])
            ?>
        </div>
    </section>
</div>