<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auto_model}}`.
 */
class m200809_104527_create_auto_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auto_model}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment("Название"),
            'brand_id' => $this->integer()->notNull()->comment("Автопроизводитель")
        ]);
        $this->createIndex("model_brand_index", '{{%auto_model}}', "brand_id");
        $this->addForeignKey("model_brand", "{{%auto_model}}", "brand_id", "{{%brand}}", "id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex("model_brand_index", "{{%auto_model}}");
        $this->dropForeignKey("model_brand", "{{%auto_model}}");
        $this->dropTable('{{%auto_model}}');
    }
}
