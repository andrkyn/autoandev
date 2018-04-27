<?php

use yii\db\Migration;

/**
 * Class m180417_100706_create_cars_categories
 */
class m180417_100706_create_cars_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('cars_categories', [
            'id' => $this->primaryKey(),
            'cars_id' => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
            ]);

        $this->addForeignKey('fk_cars_cars_categories', 'cars_categories', 'cars_id', 'cars', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_categories_cars_categories', 'cars_categories', 'category_id', 'categories', 'id', 'CASCADE', 'CASCADE');

    }



    public function Down()
    {
        //$this->dropTable('categories');
        $this->dropForeignKey('fk_cars_cars_categories','cars_categories');
        $this->dropForeignKey('fk_categories_cars_categories', 'cars_categories');
        $this->dropTable('cars_categories');
        //$this->dropTable('user');
        return true;
    }

}
