<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_type}}`.
 */
class m261100_085231_create_event_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_type}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Выставка'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Концерт'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Спектакль'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Кино'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Обучение'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Встреча'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Экскурсия'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Праздник'
        ]);

        $this->insert('{{%event_type}}', [
            'title' => 'Прочее'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_type}}');
    }
}
