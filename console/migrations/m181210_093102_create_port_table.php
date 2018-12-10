<?php

use yii\db\Migration;

/**
 * Handles the creation of table `port`.
 * Has foreign keys to the tables:
 *
 * - `device`
 * - `order`
 */
class m181210_093102_create_port_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('port', [
            'id' => $this->primaryKey(),
            'number' => $this->string(100),
            'device_id' => $this->integer(),
            'order_id' => $this->integer(),
            'status' => $this->integer(),
        ]);

        // creates index for column `device_id`
        $this->createIndex(
            'idx-port-device_id',
            'port',
            'device_id'
        );

        // add foreign key for table `device`
        $this->addForeignKey(
            'fk-port-device_id',
            'port',
            'device_id',
            'device',
            'id',
            'CASCADE'
        );

        // creates index for column `order_id`
        $this->createIndex(
            'idx-port-order_id',
            'port',
            'order_id'
        );

        // add foreign key for table `order`
        $this->addForeignKey(
            'fk-port-order_id',
            'port',
            'order_id',
            'order',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `device`
        $this->dropForeignKey(
            'fk-port-device_id',
            'port'
        );

        // drops index for column `device_id`
        $this->dropIndex(
            'idx-port-device_id',
            'port'
        );

        // drops foreign key for table `order`
        $this->dropForeignKey(
            'fk-port-order_id',
            'port'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-port-order_id',
            'port'
        );

        $this->dropTable('port');
    }
}
