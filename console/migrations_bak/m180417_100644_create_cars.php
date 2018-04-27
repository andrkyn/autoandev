<?php

use yii\db\Migration;

/**
 * Class m180417_100644_create_cars
 */
class m180417_100644_create_cars extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('cars', [
            'id' => $this->primaryKey(),
            'category' => $this->integer(4),
            'name' => $this->string(),
            'parent' => $this->integer(),
            'price' => $this->string(),
            'motor' => $this->string(),
            'color' => $this->integer(4),
            'img' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        //$this->dropTable('categories');
        $this->dropTable('cars');
        //$this->dropTable('user');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180417_100644_create_cars cannot be reverted.\n";

        return false;
    }
    */
}
