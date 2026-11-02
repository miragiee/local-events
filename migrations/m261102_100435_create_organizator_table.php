<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organizator}}`.
 */
class m261102_100435_create_organizator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organizator}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organizator}}');
    }
}
