<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

$isGuest = Yii::$app->user->isGuest;

$items = [
    [
        'label' => 'Главная',
        'url' => ['/site/index'],
    ],
    [
        'label' => 'Мероприятия',
        'url' => ['/site/all-events'],
    ],
    [
        'label' => 'Мои записи',
        'url' => ['/site/my-events'],
    ],
    [
        'label' => Html::tag('span', 'Войти', ['class' => 'btn login-btn']),
        'url' => ['/site/login'],
        'encode' => false,
        'visible' => $isGuest,
    ],
    [
        'label' => Html::img(
            Url::to('@web/resources/images/sakura-art.png'),
            ['alt' => 'Профиль', 'class' => 'profile-avatar']
        ),
        'url' => ['/site/profile'],
        'encode' => false,
        'visible' => !$isGuest,
    ],
];
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Главная</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= Url::to('@web/css/styles.css') ?>" />
</head>

<body>
    <?php $this->beginBody() ?>

    <header>
        <div class="container">
            <?php NavBar::begin([
                'brandLabel' => 'Локаливент',
                'brandUrl' => Yii::$app->homeUrl,
                'brandOptions' => ['class' => 'name'],
                'options' => [
                    'class' => 'navbar navbar-expand-md custom-header',
                ],
                'renderInnerContainer' => false,
            ]) ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <?= Nav::widget([
                    'options' => ['class' => 'navbar-nav ml-auto'],
                    'encodeLabels' => false,
                    'items' => $items,
                ]) ?>
            </div>

            <?php NavBar::end() ?>
        </div>
    </header>

    <main>
        <?= $content ?>
    </main>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>