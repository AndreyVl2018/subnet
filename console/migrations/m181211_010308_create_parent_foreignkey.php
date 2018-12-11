<?php

use yii\db\Migration;

/**
 * Class m181211_010308_create_parent_foreignkey
 */
class m181211_010308_create_parent_foreignkey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // 1. creates index for column `parent_ip_id`
        $this->createIndex(
            'idx-device-parent_ip_id',
            'device',
            'parent_ip_id'
        );

        // add foreign key for table `device`
        $this->addForeignKey(
            'fk-device-parent_ip_id',
            'device',
            'parent_ip_id',
            'ip',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        // 2. creates index for column `parent_port_id`
        $this->createIndex(
            'idx-device-parent_port_id',
            'device',
            'parent_port_id'
        );

        // add foreign key for table `device`
        $this->addForeignKey(
            'fk-device-parent_port_id',
            'device',
            'parent_port_id',
            'port',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        // 3. creates index for column `parent_vlan_id`
        $this->createIndex(
            'idx-device-parent_vlan_id',
            'device',
            'parent_vlan_id'
        );

        // add foreign key for table `device`
        $this->addForeignKey(
            'fk-device-parent_vlan_id',
            'device',
            'parent_vlan_id',
            'vlan',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // 1. drops foreign key for table `device`
        $this->dropForeignKey(
            'fk-device-parent_vlan_id',
            'device'
        );
        // drops index for column `parent_vlan_id`
        $this->dropIndex(
            'idx-device-parent_vlan_id',
            'device'
        );
        // 2. drops foreign key for table `device`
        $this->dropForeignKey(
            'fk-device-parent_port_id',
            'device'
        );
        // drops index for column `parent_port_id`
        $this->dropIndex(
            'idx-device-parent_port_id',
            'device'
        );
        // 3. drops foreign key for table `device`
        $this->dropForeignKey(
            'fk-device-parent_ip_id',
            'device'
        );
        // drops index for column `parent_ip_id`
        $this->dropIndex(
            'idx-device-parent_ip_id',
            'device'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181211_010308_create_parent_foreignkey cannot be reverted.\n";

        return false;
    }
    */
}
