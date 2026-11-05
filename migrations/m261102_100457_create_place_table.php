<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%place}}`.
 */
class m261102_100457_create_place_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%place}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'address' => $this->string(255)
        ]);

        $this->insert('{{%place}}', [
            'title' => 'Остров Эпштейна',
            'address' => 'Остров Литл Сейнт Джеймс'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%place}}');
    }
}
