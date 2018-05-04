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
            'name' => $this->string(30),
            'slug' => $this->string(30)->notNull()->unique(),
            'img' => $this->string(),
            'date'=> $this->dateTime()->notNull(),
            'description' => $this->text()
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
