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
            'brandId' => $this->integer(),
            'categoryId' => $this->integer()->notNull(),
            'name' => $this->string(30),
            'slug' => $this->string(30)->notNull()->unique(),
            'engine' => $this->string(10)->notNull(),     //объем двигателя
            'year' => $this->integer(4),
            'img' => $this->string(),
            'date' => $this->timestamp()->defaultExpression('NOW()'),
            'date_modified' => $this->timestamp()->defaultExpression('NOW()'),
            'description' => $this->text()
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
