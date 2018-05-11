<?php

use yii\db\Migration;

/**
 * Class m180511_114135_replace_table_car
 */
class m180511_114135_replace_table_car extends Migration
{

    public function Up()
    {
        $this->alterColumn('car','brandId', $this->integer()->notNull());
        $this->alterColumn('car','name', $this->string(255));
    }

    public function Down()
    {
        $this->alterColumn('car','brandId', $this->integer());
        $this->alterColumn('car','name', $this->string(30));
    }

}
