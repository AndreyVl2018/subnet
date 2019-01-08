<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vlan`.
 * Has foreign keys to the tables:
 *
 * - `groupvlan`
 * - `order`
 */
class m181210_093247_create_vlan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vlan', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(),
            'description' => $this->string(255),
            'groupvlan_id' => $this->integer(),
            'order_id' => $this->integer(),
            'status' => $this->integer(),
        ]);

        // creates index for column `groupvlan_id`
        $this->createIndex(
            'idx-vlan-groupvlan_id',
            'vlan',
            'groupvlan_id'
        );

        // add foreign key for table `groupvlan`
        $this->addForeignKey(
            'fk-vlan-groupvlan_id',
            'vlan',
            'groupvlan_id',
            'groupvlan',
            'id',
            'CASCADE'
        );

        // creates index for column `order_id`
        $this->createIndex(
            'idx-vlan-order_id',
            'vlan',
            'order_id'
        );

        // add foreign key for table `order`
        $this->addForeignKey(
            'fk-vlan-order_id',
            'vlan',
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
        // drops foreign key for table `groupvlan`
        $this->dropForeignKey(
            'fk-vlan-groupvlan_id',
            'vlan'
        );

        // drops index for column `groupvlan_id`
        $this->dropIndex(
            'idx-vlan-groupvlan_id',
            'vlan'
        );

        // drops foreign key for table `order`
        $this->dropForeignKey(
            'fk-vlan-order_id',
            'vlan'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-vlan-order_id',
            'vlan'
        );

        $this->dropTable('vlan');
    }
}
