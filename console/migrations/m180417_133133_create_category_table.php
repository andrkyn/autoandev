<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180417_133133_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'slug' => $this->string(30)->notNull()->unique(),
            'content' => $this->text(),
            'img' => $this->string(),
            'upDate' => $this->integer()->notNull(),
            'description' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
