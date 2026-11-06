<div class="container">
    <h2>Все мероприятия</h2>

    <?= $this->render('../layouts/_filters') ?>

    <section class="event-list-section">
        <h3>Предстоящие мероприятия</h3>
        <div class="event-cards" aria-label="Список мероприятий">

            <?php if (empty($dataProvider->getModels())):  ?>
                <p>Мероприятий нет</p>
            <?php else: ?>
                <?php foreach ($dataProvider->getModels() as $event): ?>
                    <?= $this->render('/layouts/_card', [
                        'event' => $event,
                        'registeredEventIds' => $registeredEventIds
                    ]) ?>
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