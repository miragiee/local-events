<?php

use yii\helpers\Url;
use yii\helpers\Html;

$get = Yii::$app->request->get();
$currentType = $get['type'] ?? '';
$currentOrg = $get['organizator'] ?? '';
$currentPlace = $get['place'] ?? '';
$currentPrice = $get['price'] ?? '';
$currentDate = $get['date'] ?? '';
?>

<form method="get" action="" class="filters mobile-filter-bar">
    <input class="filters-toggle" type="checkbox" id="filters-toggle" aria-label="Показать фильтры" />
    <label class="filters-toggle-button" for="filters-toggle">
        <img src="../resources/icons/filter_alt_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="" />
    </label>

    <div class="filter-options">
        <select class="mobile-category-filter" name="type" aria-label="Категория">
            <option value="" <?= $currentType === '' ? 'selected' : '' ?>>Все категории</option>
            <?php foreach ($types as $type): ?>
                <option value="<?= $type->id ?>" <?= $currentType == $type->id ? 'selected' : '' ?>>
                    <?= Html::encode($type->title) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="type-filters">
            <label class="text-btn <?= $currentType === '' ? 'selected' : '' ?>">
                <input type="radio" name="type" value="" <?= $currentType === '' ? 'checked' : '' ?> style="display:none;">Все
            </label>
            <?php foreach ($types as $type): ?>
                <label class="text-btn <?= $currentType == $type->id ? 'selected' : '' ?>">
                    <input type="radio" name="type" value="<?= $type->id ?>" <?= $currentType == $type->id ? 'checked' : '' ?> style="display:none;">
                    <?= Html::encode($type->title) ?>
                </label>
            <?php endforeach; ?>
        </div>

        <div class="other-filters">
            <a href="<?= Url::to([Yii::$app->controller->route]) ?>" class="clear-btn">
                <img src="../resources/icons/ink_eraser_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Очистить" />
            </a>

            <select name="organizator" id="organizator">
                <option value="" <?= $currentOrg === '' ? 'selected' : '' ?>>Все организаторы</option>
                <?php foreach ($organizers as $org): ?>
                    <option value="<?= $org->id ?>" <?= $currentOrg == $org->id ? 'selected' : '' ?>>
                        <?= Html::encode($org->title) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="place" id="places">
                <option value="" <?= $currentPlace === '' ? 'selected' : '' ?>>Все площадки</option>
                <?php foreach ($places as $place): ?>
                    <option value="<?= $place->id ?>" <?= $currentPlace == $place->id ? 'selected' : '' ?>>
                        <?= Html::encode($place->title) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="price" id="prices">
                <option value="" <?= $currentPrice === '' ? 'selected' : '' ?>>Любая цена</option>
                <option value="free" <?= $currentPrice === 'free' ? 'selected' : '' ?>>Бесплатно</option>
                <option value="paid" <?= $currentPrice === 'paid' ? 'selected' : '' ?>>Платно</option>
            </select>

            <label class="mobile-date-filter" for="event-date">
                <span>Дата</span>
                <input type="date" name="date" id="event-date" value="<?= Html::encode($currentDate) ?>" />
            </label>
        </div>

        <button type="submit" class="mobile-filter-apply" style="border:none; cursor:pointer; width:100%;">Применить</button>
    </div>
</form>