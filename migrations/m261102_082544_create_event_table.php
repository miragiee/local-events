<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m261102_082544_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(1000)->notNull(),
            'price' => $this->integer()->notNull(),
            'city' => $this->string(255)->notNull(),
            'participations' => $this->integer(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'organizator_id' => $this->integer()->notNull(),
            'place_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'image_URL' => $this->string(255),
            'status' => $this->string(255)->defaultValue("Предстоит")
        ]);

        $this->insert('{{%event}}', [
            'title' => 'Снос базы под 0',
            'description' => 'Не надо было переходить дорога великий китайский клан. 为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。-1000 Social Credit.',
            'price' => '0',
            'city' => 'Шанхай',
            'participations' => '1001',
            'start_date' => '2026-11-11',
            'end_date' => '2026-11-12',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'web/resources/images/omon.png'
        ]);

        $images = [
            'web/resources/images/omon.png',
            'web/resources/images/musya.jpg',
            'web/resources/images/syrneke.jpg',
            'web/resources/images/event-image-placeholder.jpg'
        ];

        $cities = [
            'Москва',
            'Санкт-Петербург',
            'Череповец',
            'Вологда'
        ];

        for ($i = 1; $i <= 30; $i++) {
            $startTimestamp = time() + (mt_rand(-60, 120) * 86400);
            $startDate = date('Y-m-d', $startTimestamp);
            $endDate = date('Y-m-d', $startTimestamp + (mt_rand(1, 5) * 86400));
            $isFree = mt_rand(0, 1) === 1;
            $price = $isFree ? 0 : mt_rand(500, 5000);
            $city = $cities[array_rand($cities)];

            $this->insert('{{%event}}', [
                'title' => 'Тестовое мероприятие #' . $i,
                'description' => 'Это тестовое описание для мероприятия #' . $i . '. Оно создано автоматически для проверки работы фильтров и отображения карточек.',
                'price' => $price,
                'city' => $city,
                'participations' => mt_rand(10, 1000),
                'start_date' => $startDate,
                'end_date' => $endDate,
                'organizator_id' => mt_rand(1, 3),
                'place_id' => mt_rand(1, 3),
                'type_id' => mt_rand(1, 9),
                'image_URL' => $images[array_rand($images)],
                'status' => 'Предстоять'
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
