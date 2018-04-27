<?php

use yii\db\Migration;

/**
 * Class m180417_100653_create_categories
 */
class m180417_100653_create_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent' => $this->integer(),
            'img' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('categories');
        //$this->dropTable('cars');
        //$this->dropTable('user');
        return true;
    }


}
