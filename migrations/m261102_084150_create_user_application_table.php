<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_application}}`.
 */
class m261102_084150_create_user_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_application}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-application-event_id',
            'user_application',
            'event_id',
            'event',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-application-user_id',
            'user_application',
            'user_id',
            'user',
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
        $this->dropTable('{{%user_application}}');
    }
}
