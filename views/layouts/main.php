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

    <?= $this->render('_header') ?>

    <main>
        <?= $content ?>
    </main>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>