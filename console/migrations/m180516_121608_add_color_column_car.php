<?php

use yii\db\Migration;

/**
 * Class m180516_121608_add_color_column_car
 */
class m180516_121608_add_color_column_car extends Migration
{

    public function Up()
    {
        $this->addColumn('car', 'colorId', $this->integer());

        $this->createIndex('idx-car-colorId', 'car', 'colorId');
        $this->addForeignKey(
            'fk-car-colorId',
            'car',
            'colorId',
            'color',
            'id'
        );
    }

    public function Down()
    {
        $this->dropColumn('car', 'colorId');

        $this->dropForeignKey('fk-car-colorId', 'car');
        $this->dropIndex('idx-car-colorId', 'car');
    }

}
