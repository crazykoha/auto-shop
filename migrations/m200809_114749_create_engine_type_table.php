<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%engine_type}}`.
 */
class m200809_114749_create_engine_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%engine_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%engine_type}}');
    }
}
