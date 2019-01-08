<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subnet`.
 * Has foreign keys to the tables:
 *
 * - `area`
 */
class m181210_092004_create_subnet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subnet', [
            'id' => $this->primaryKey(),
            'ip' => $this->double(),
            'mask' => $this->integer(),         // выбор из массива префикс/маска
            'gateway' => $this->double(),
            'name' => $this->string(100),       // поле для перехода со старой базы
            'description' => $this->string(255),
            'area_id' => $this->integer(),
        ]);

        // creates index for column `area_id`
        $this->createIndex(
            'idx-subnet-area_id',
            'subnet',
            'area_id'
        );

        // add foreign key for table `area`
        $this->addForeignKey(
            'fk-subnet-area_id',
            'subnet',
            'area_id',
            'area',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `area`
        $this->dropForeignKey(
            'fk-subnet-area_id',
            'subnet'
        );

        // drops index for column `area_id`
        $this->dropIndex(
            'idx-subnet-area_id',
            'subnet'
        );

        $this->dropTable('subnet');
    }
}
