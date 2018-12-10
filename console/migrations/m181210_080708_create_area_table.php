<?php

use yii\db\Migration;

/**
 * Handles the creation of table `area`.
 */
class m181210_080708_create_area_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('area', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'discription' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('area');
    }
}
