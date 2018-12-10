<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 * Has foreign keys to the tables:
 *
 * - `service`
 * - `area`
 */
class m181210_083057_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'number' => $this->string(100),
            'abonent' => $this->string(255),
            'adress' => $this->string(255),
            'service_id' => $this->integer(),
            'area_id' => $this->integer(),
        ]);

        // creates index for column `service_id`
        $this->createIndex(
            'idx-order-service_id',
            'order',
            'service_id'
        );

        // add foreign key for table `service`
        $this->addForeignKey(
            'fk-order-service_id',
            'order',
            'service_id',
            'service',
            'id',
            'CASCADE'
        );

        // creates index for column `area_id`
        $this->createIndex(
            'idx-order-area_id',
            'order',
            'area_id'
        );

        // add foreign key for table `area`
        $this->addForeignKey(
            'fk-order-area_id',
            'order',
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
        // drops foreign key for table `service`
        $this->dropForeignKey(
            'fk-order-service_id',
            'order'
        );

        // drops index for column `service_id`
        $this->dropIndex(
            'idx-order-service_id',
            'order'
        );

        // drops foreign key for table `area`
        $this->dropForeignKey(
            'fk-order-area_id',
            'order'
        );

        // drops index for column `area_id`
        $this->dropIndex(
            'idx-order-area_id',
            'order'
        );

        $this->dropTable('order');
    }
}
