<?php

use yii\db\Migration;

/**
 * Class m180507_084714_rename_column
 */
class m180507_084714_rename_column_brand extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->renameColumn('brand', 'upDate', 'date');
        $this->alterColumn('brand','date', $this->integer());
        $this->alterColumn('brand','date', $this->timestamp()->defaultExpression('NOW()'));
    }

    public function down()
    {
        $this->renameColumn('brand', 'upDate', 'date');
        $this->alterColumn('brand','date', $this->integer());
        $this->alterColumn('brand','date', $this->timestamp()->defaultExpression('NOW()'));

    }

}
