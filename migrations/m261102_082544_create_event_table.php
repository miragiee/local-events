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
            'participations' => '1001',
            'start_date' => '2026-11-11',
            'end_date' => '2026-11-12',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'web/resources/images/omon.png'
        ]);

        $this->insert('{{%event}}', [
            'title' => 'Рейд на нелегальных мигрантов',
            'description' => 'Депортация.',
            'participations' => '129',
            'start_date' => '2026-11-1',
            'end_date' => '2026-11-3',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'web/resources/images/musya.jpg'
        ]);

        $this->insert('{{%event}}', [
            'title' => 'Рейд на нелегальных мигрантов',
            'description' => 'Депортация.',
            'participations' => '93',
            'start_date' => '2026-12-11',
            'end_date' => '2026-11-12',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'web/resources/images/syrneke.jpg'
        ]);

        $this->insert('{{%event}}', [
            'title' => 'Рейд на нелегальных мигрантов',
            'description' => 'Депортация.',
            'participations' => '63',
            'start_date' => '2026-12-14',
            'end_date' => '2026-11-12',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'web/resources/images/event-image-placeholder.jpg'
        ]);

        $this->insert('{{%event}}', [
            'title' => 'Рейд на нелегальных мигрантов',
            'description' => 'Депортация.',
            'participations' => '12',
            'start_date' => '2027-01-02',
            'end_date' => '2026-11-12',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'web/resources/images/event-image-placeholder.jpg'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
