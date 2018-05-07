<?php

use yii\db\Migration;

/**
 * Class m180507_112746_rename_column_car
 */
class m180507_112746_rename_column_car extends Migration
{

    public function Up()
    {
        $this->renameColumn('car', 'upDate', 'date');
        $this->alterColumn('car','date', $this->integer());
        $this->alterColumn('car','date', $this->timestamp()->defaultExpression('NOW()'));

    }

    public function down()
    {
        $this->renameColumn('car', 'date', 'upDate');
        $this->alterColumn('car','upDate', $this->integer(11));
    }


}
