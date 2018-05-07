<?php

use yii\db\Migration;

/**
 * Class m180507_112740_rename_column_category
 */
class m180507_112740_rename_column_category extends Migration
{
    public function Up()
    {
        $this->renameColumn('category', 'upDate', 'date');
        $this->alterColumn('category','date', $this->integer());
        $this->alterColumn('category','date', $this->timestamp()->defaultExpression('NOW()'));

    }

    public function down()
    {
        $this->renameColumn('category', 'date', 'upDate');
        $this->alterColumn('category','upDate', $this->integer(11));
    }
}
