<div class="container">
    <h2>Мои записи</h2>

    <?= $this->render('/layouts/_filters', [
        'types' => $types,
        'organizers' => $organizers,
        'places' => $places,
    ]) ?>

    <section class="event-list-section">
        <h3>Предстоящие мероприятия</h3>
        <div class="event-cards scroll-cards">
            <?php if (empty($upcomingDataProvider->getModels())): ?>
                <p>У вас нет предстоящих записей.</p>
            <?php else: ?>
                <?php foreach ($upcomingDataProvider->getModels() as $event): ?>
                    <?= $this->render('/layouts/_card', [
                        'event' => $event,
                        'registeredEventIds' => $registeredEventIds,
                        'isPast' => false
                    ]) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="event-list-section">
        <h3>Прошедшие мероприятия</h3>
        <div class="event-cards scroll-cards">
            <?php if (empty($pastDataProvider->getModels())): ?>
                <p>У вас нет прошедших записей.</p>
            <?php else: ?>
                <?php foreach ($pastDataProvider->getModels() as $event): ?>
                    <?= $this->render('/layouts/_card', [
                        'event' => $event,
                        'registeredEventIds' => $registeredEventIds,
                        'isPast' => true
                    ]) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</div>