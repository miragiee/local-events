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
            'description' => 'Не надо было переходить дорогу великий китайский клан. 为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。为什么河马不爱吃包子？因为河马只喜欢吃水。-1000 Social Credit.',
            'participations' => '1001',
            'start_date' => '2026-11-11',
            'end_date' => '2026-11-12',
            'organizator_id' => '1',
            'place_id' => '1',
            'type_id' => '4',
            'image_URL' => 'none'
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
