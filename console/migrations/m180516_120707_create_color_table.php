<?php

use yii\db\Migration;

/**
 * Handles the creation of table `color`.
 */
class m180516_120707_create_color_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('color', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'code' => $this->string(6),
            'is_enabled' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('color');
    }
}
