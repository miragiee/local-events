<div class="container">
    <h2>Все мероприятия</h2>
    <section class="filters mobile-filter-bar">
        <input class="filters-toggle" type="checkbox" id="filters-toggle" aria-label="Показать фильтры" />
        <label class="filters-toggle-button" for="filters-toggle">
            <img src="../resources/icons/filter_alt_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="" />
        </label>
        <div class="filter-options">
            <select class="mobile-category-filter" name="categories" aria-label="Категория">
                <option value="" disabled selected>Категория</option>
                <option value="all">Все</option>
                <option value="exhibitions">Выставки</option>
                <option value="concerts">Концерты</option>
                <option value="performances">Спектакли</option>
                <option value="cinema">Кино</option>
                <option value="education">Обучение</option>
                <option value="meetings">Встречи</option>
                <option value="excursions">Экскурсии</option>
                <option value="holidays">Праздники</option>
                <option value="other">Прочее</option>
            </select>
            <div class="type-filters">
                <button class="text-btn selected">Все</button>
                <button class="text-btn">Выставки</button>
                <button class="text-btn">Концерты</button>
                <button class="text-btn">Спектакли</button>
                <button class="text-btn">Кино</button>
                <button class="text-btn">Обучение</button>
                <button class="text-btn">Встречи</button>
                <button class="text-btn">Экскурсии</button>
                <button class="text-btn">Праздники</button>
                <button class="text-btn">Прочее</button>
            </div>
            <div class="other-filters">
                <button class="clear-btn">
                    <img src="../resources/icons/ink_eraser_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
                        alt="Очистить" />
                </button>

                <select name="cities" id="citise">
                    <option value="" disabled selected>По всей стране</option>
                    <option value="moskow">Москва</option>
                    <option value="saint-petersburg">Санкт-Петербург</option>
                    <option value="cherepovets">Череповец</option>
                    <option value="vladivostok">Владивосток</option>
                </select>
                <select name="organizators" id="organizator">
                    <option value="" disabled selected>Все организаторы</option>
                    <option value="opt1">Опция 1</option>
                    <option value="opt2">Опция 2</option>
                </select>
                <select name="places" id="places">
                    <option value="" disabled selected>Все площадки</option>
                    <option value="opt1">Опция 1</option>
                    <option value="opt2">Опция 2</option>
                </select>
                <select name="prices" id="prices">
                    <option value="" disabled selected>Любая цена</option>
                    <option value="opt1">Опция 1</option>
                    <option value="opt2">Опция 2</option>
                </select>
                <label class="mobile-date-filter" for="event-date">
                    <span>Дата</span>
                    <input type="date" id="event-date" />
                </label>
            </div>
            <label class="mobile-filter-apply" for="filters-toggle">Применить</label>
        </div>
    </section>

    <section class="event-list-section">
        <h3>Предстоящие мероприятия</h3>
        <div class="event-cards" aria-label="Список мероприятий">

            <?php if (empty($dataProvider->getModels())):  ?>
                <p>Мероприятий нет</p>
            <?php else: ?>
                <?php foreach ($dataProvider->getModels() as $event):  ?>
                    <?= $this->render('/layouts/_card', ['event' => $event]) ?>
                <?php endforeach; ?>
            <?php endif;  ?>
        </div>

        <div class="pagination-wrapper">
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