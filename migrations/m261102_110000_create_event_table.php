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
            'organiztor_id' => $this->integer()->notNull(),
            'place_id' => $this->integer()->notNull(),
            'image_URL' => $this->string(255),
            'status' => $this->string(255)->defaultValue("Предстоит")
        ]);

        $this->addForeignKey(
            'fk-event-organizator_id',
            'event',
            'organizator_id',
            'organizator',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-event-place_id',
            'event',
            'place_id',
            'place',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
