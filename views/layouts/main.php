<?php

use yii\bootstrap4\BootstrapAsset;
use yii\helpers\Url;
use yii\web\YiiAsset;


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
            <a href="<?= Url::to('@web/site/index') ?>" class="name">Локаливент</a>

            <nav>
                <a href="<?= Url::to('@web/site/index') ?>">Главная</a>
                <a href="<?= Url::to('@web/site/all-events') ?>">Мероприятия</a>
                <a href="<?= Url::to('@web/site/my-events') ?>">Мои записи</a>
                <a href="<?= Url::to('@web/site/profile') ?>">
                    <img src="../../web/resources/images/sakura-art.png" alt="Профиль" />
                </a>
            </nav>
            <details class="mobile-menu">
                <summary aria-label="Меню">
                    <span></span>
                    <span></span>
                    <span></span>
                </summary>
                <nav>
                    <a href="/index.html">Главная</a>
                    <a href="/pages/all-events.html">Мероприятия</a>
                    <a href="/pages/my-events.html">Мои записи</a>
                    <a href="/pages/profile.html" aria-label="Профиль">
                        <img src="../resources/images/sakura-art.png" alt="" />
                        <span>Профиль</span>
                    </a>
                </nav>
            </details>
        </div>
    </header>
    <main>

        <?= $content ?>

    </main>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>