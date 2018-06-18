<?php

use yii\db\Migration;

/**
 * Class m180618_073900_replace_column_img
 */
class m180618_073900_replace_column_img extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('brand', 'img', 'image');
        $this->renameColumn('category', 'img', 'image');
        $this->renameColumn('car', 'img', 'image');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('brand', 'image', 'img');
        $this->renameColumn('category', 'image', 'img');
        $this->renameColumn('car', 'image', 'img');
    }

}
