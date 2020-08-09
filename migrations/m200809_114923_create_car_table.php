<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m200809_114923_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'auto_model_id' => $this->integer()->notNull(),
            'engine_type_id' => $this->integer()->notNull(),
            'drive_unit_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('car_model', '{{%car}}', 'auto_model_id', '{{%auto_model}}', 'id');
        $this->addForeignKey('car_engine_type', '{{%car}}', 'engine_type_id', '{{%engine_type}}', 'id');
        $this->addForeignKey('car_drive_unit', '{{%car}}', 'drive_unit_id', '{{%drive_unit}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('car_model', '{{%car}}');
        $this->dropForeignKey('car_engine_type', '{{%car}}');
        $this->dropForeignKey('car_drive_unit', '{{%car}}');
        $this->dropTable('{{%car}}');
    }
}
