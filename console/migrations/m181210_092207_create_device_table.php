<?php

use yii\db\Migration;

/**
 * Handles the creation of table `device`.
 * Has foreign keys to the tables:
 *
 * - `area`
 */
class m181210_092207_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(100),
            'modeldevice' => $this->string(100),
            'roledevice' => $this->string(100),
            'discription' => $this->string(255),
            'area_id' => $this->integer(),
            'parent_ip_id' => $this->integer(),
            'parent_port_id' => $this->integer(),
            'parent_vlan_id' => $this->integer(),
        ]);

        // creates index for column `area_id`
        $this->createIndex(
            'idx-device-area_id',
            'device',
            'area_id'
        );

        // add foreign key for table `area`
        $this->addForeignKey(
            'fk-device-area_id',
            'device',
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
            'fk-device-area_id',
            'device'
        );

        // drops index for column `area_id`
        $this->dropIndex(
            'idx-device-area_id',
            'device'
        );

        $this->dropTable('device');
    }
}
