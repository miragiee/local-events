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
            'status' => $this->string(255)->defaultValue("Оформлено")
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_application}}');
    }
}
