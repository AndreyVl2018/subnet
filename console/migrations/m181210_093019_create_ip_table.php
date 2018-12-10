<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ip`.
 * Has foreign keys to the tables:
 *
 * - `subnet`
 * - `order`
 */
class m181210_093019_create_ip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ip', [
            'id' => $this->primaryKey(),
            'iplong' => $this->double(),
            'ipstr' => $this->string(15),
            'subnet_id' => $this->integer(),
            'order_id' => $this->integer(),
            'status' => $this->integer(),
        ]);

        // creates index for column `subnet_id`
        $this->createIndex(
            'idx-ip-subnet_id',
            'ip',
            'subnet_id'
        );

        // add foreign key for table `subnet`
        $this->addForeignKey(
            'fk-ip-subnet_id',
            'ip',
            'subnet_id',
            'subnet',
            'id',
            'CASCADE'
        );

        // creates index for column `order_id`
        $this->createIndex(
            'idx-ip-order_id',
            'ip',
            'order_id'
        );

        // add foreign key for table `order`
        $this->addForeignKey(
            'fk-ip-order_id',
            'ip',
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
        // drops foreign key for table `subnet`
        $this->dropForeignKey(
            'fk-ip-subnet_id',
            'ip'
        );

        // drops index for column `subnet_id`
        $this->dropIndex(
            'idx-ip-subnet_id',
            'ip'
        );

        // drops foreign key for table `order`
        $this->dropForeignKey(
            'fk-ip-order_id',
            'ip'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-ip-order_id',
            'ip'
        );

        $this->dropTable('ip');
    }
}
