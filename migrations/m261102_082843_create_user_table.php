<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m261102_082843_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull()->defaultValue(1),
            'email' => $this->string(255)->unique(),
            'password' => $this->string(255)->notNull(),
            'fisrt_name' => $this->string(255),
            'last_name' => $this->string(255),
            'patronymic' => $this->string(255),
            'phone_number' => $this->string(255)->unique(),
            'city' => $this->string(255),
            'avatar_URL' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
