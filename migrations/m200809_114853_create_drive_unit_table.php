<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%drive_unit}}`.
 */
class m200809_114853_create_drive_unit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%drive_unit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%drive_unit}}');
    }
}
