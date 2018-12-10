<?php

use yii\db\Migration;

/**
 * Handles the creation of table `groupvlan`.
 * Has foreign keys to the tables:
 *
 * - `area`
 */
class m181210_092725_create_groupvlan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('groupvlan', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'discription' => $this->string(255),
            'firstvlan' => $this->string(15),
            'lastvlan' => $this->string(15),
            'area_id' => $this->integer(),
        ]);

        // creates index for column `area_id`
        $this->createIndex(
            'idx-groupvlan-area_id',
            'groupvlan',
            'area_id'
        );

        // add foreign key for table `area`
        $this->addForeignKey(
            'fk-groupvlan-area_id',
            'groupvlan',
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
            'fk-groupvlan-area_id',
            'groupvlan'
        );

        // drops index for column `area_id`
        $this->dropIndex(
            'idx-groupvlan-area_id',
            'groupvlan'
        );

        $this->dropTable('groupvlan');
    }
}
