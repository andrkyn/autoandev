<?php

use yii\db\Migration;

/**
 * Handles the creation of table `brand`.
 */
class m180417_132841_create_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'slug' => $this->string(30)->notNull()->unique(),
            'img' => $this->string()->notNull(),
            'upDate' => $this->integer()->notNull(),
            'description' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('brand');
    }
}
