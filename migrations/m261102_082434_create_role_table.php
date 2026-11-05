<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m261102_082434_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique(),
        ]);

        $this->insert('{{%role}}', [
            'title' => 'Пользователь',
        ]);

        $this->insert('{{%role}}', [
            'title' => 'Администратор',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
