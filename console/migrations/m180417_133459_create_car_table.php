<?php

use yii\db\Migration;

/**
 * Handles the creation of table `car`.
 */
class m180417_133459_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'brandId' => $this->integer()->notNull(),
            'categoryId' => $this->integer()->notNull(),
            'name' => $this->string(30)->notNull(),
            'slug' => $this->string(30)->notNull()->unique(),
            'title' => $this->string(),
            'content' => $this->text(),
            'price' => $this->integer(6)->notNull(),
            'transmission' => $this->string()->notNull(),
            'engine' => $this->string()->notNull(),
            'speed' => $this->integer(3)->notNull(),
            'fuelConsumption' => $this->integer(2),
            'drive' => $this->string()->notNull(),
            'trunkVolume' => $this->integer(3),
            'bodyStyle' => $this->string()->notNull(),
            'color' => $this->string(),
            'year' => $this->integer(4)->notNull(),
            'img' => $this->string()->notNull(),
            'upDate' => $this->integer(11)->notNull(),
            'description' => $this->string()
        ]);

        $this->createIndex('idx-car-brandId', 'car', 'brandId');
        $this->addForeignKey(
            'fk-car-brandId',
            'car',
            'brandId',
            'brand',
            'id',
            'CASCADE'
        );

        $this->createIndex('idx-car-categoryId', 'car', 'categoryId');
        $this->addForeignKey(
            'fk-car-categoryId',
            'car',
            'categoryId',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-car-categoryId', 'car');
        $this->dropIndex('idx-car-categoryId', 'car');

        $this->dropForeignKey('fk-car-brandId', 'car');
        $this->dropIndex('idx-car-brandId', 'car');

        $this->dropTable('car');
    }
}
