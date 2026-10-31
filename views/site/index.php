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
        <div class="event-cards">
            <div class="event-card">
                <div class="event-card-image-wrapper">
                    <img class="event-card-image" src="../resources/images/event-image-placeholder.jpg"
                        alt="Название мероприятия" />
                </div>

                <div class="event-card-data">
                    <div class="primary-data">
                        <div class="small-text date">XX.XX.XXXX XX:XX</div>
                        <h3 class="event-name">Название Мероприятия</h3>
                    </div>

                    <div class="description">Краткое описание мероприятия</div>

                    <div class="buttons">
                        <button class="accent-btn event-register">
                            Записаться
                        </button>
                        <button class="normal-btn learn-about">
                            Узнать больше
                        </button>
                    </div>

                    <div class="participants">Участников: XXXXX</div>
                </div>
            </div>

            <div class="event-card">
                <div class="event-card-image-wrapper">
                    <img class="event-card-image" src="../resources/images/event-image-placeholder.jpg"
                        alt="Название мероприятия" />
                </div>

                <div class="event-card-data">
                    <div class="primary-data">
                        <div class="small-text date">XX.XX.XXXX XX:XX</div>
                        <h3 class="event-name">Название Мероприятия</h3>
                    </div>

                    <div class="description">Краткое описание мероприятия</div>

                    <div class="buttons">
                        <button class="accent-btn event-register">
                            Записаться
                        </button>
                        <button class="normal-btn learn-about">
                            Узнать больше
                        </button>
                    </div>

                    <div class="participants">Участников: XXXXX</div>
                </div>
            </div>

            <div class="event-card">
                <div class="event-card-image-wrapper">
                    <img class="event-card-image" src="../resources/images/event-image-placeholder.jpg"
                        alt="Название мероприятия" />
                </div>

                <div class="event-card-data">
                    <div class="primary-data">
                        <div class="small-text date">XX.XX.XXXX XX:XX</div>
                        <h3 class="event-name">Название Мероприятия</h3>
                    </div>

                    <div class="description">Краткое описание мероприятия</div>

                    <div class="buttons">
                        <button class="accent-btn event-register">
                            Записаться
                        </button>
                        <button class="normal-btn learn-about">
                            Узнать больше
                        </button>
                    </div>

                    <div class="participants">Участников: XXXXX</div>
                </div>
            </div>

            <div class="event-card">
                <div class="event-card-image-wrapper">
                    <img class="event-card-image" src="../resources/images/event-image-placeholder.jpg"
                        alt="Название мероприятия" />
                </div>

                <div class="event-card-data">
                    <div class="primary-data">
                        <div class="small-text date">XX.XX.XXXX XX:XX</div>
                        <h3 class="event-name">Название Мероприятия</h3>
                    </div>

                    <div class="description">Краткое описание мероприятия</div>

                    <div class="buttons">
                        <button class="accent-btn event-register">
                            Записаться
                        </button>
                        <button class="normal-btn learn-about">
                            Узнать больше
                        </button>
                    </div>

                    <div class="participants">Участников: XXXXX</div>
                </div>
            </div>

            <div class="event-card">
                <div class="event-card-image-wrapper">
                    <img class="event-card-image" src="../resources/images/event-image-placeholder.jpg"
                        alt="Название мероприятия" />
                </div>

                <div class="event-card-data">
                    <div class="primary-data">
                        <div class="small-text date">XX.XX.XXXX XX:XX</div>
                        <h3 class="event-name">Название Мероприятия</h3>
                    </div>

                    <div class="description">Краткое описание мероприятия</div>

                    <div class="buttons">
                        <button class="accent-btn event-register">
                            Записаться
                        </button>
                        <button class="normal-btn learn-about">
                            Узнать больше
                        </button>
                    </div>

                    <div class="participants">Участников: XXXXX</div>
                </div>
            </div>

            <div class="event-card">
                <div class="event-card-image-wrapper">
                    <img class="event-card-image" src="../resources/images/event-image-placeholder.jpg"
                        alt="Название мероприятия" />
                </div>

                <div class="event-card-data">
                    <div class="primary-data">
                        <div class="small-text date">XX.XX.XXXX XX:XX</div>
                        <h3 class="event-name">Название Мероприятия</h3>
                    </div>

                    <div class="description">Краткое описание мероприятия</div>

                    <div class="buttons">
                        <button class="accent-btn event-register">
                            Записаться
                        </button>
                        <button class="normal-btn learn-about">
                            Узнать больше
                        </button>
                    </div>

                    <div class="participants">Участников: XXXXX</div>
                </div>
            </div>
        </div>
    </section>
</div>