<?php

use yii\db\Migration;

/**
 * Class m181211_010308_create_parent_foreignkey
 */
class m181211_010308_create_parent_foreignkey extends Migration
{

/*  PRIMARY KEY (`id`),
  INDEX `idx-device-area_id` (`area_id` ASC) VISIBLE,
  INDEX `idx-device-mng_vlan_id` (`mng_vlan_id` ASC) VISIBLE,
  INDEX `fk_device_ip1_idx` (`mng_ip_id` ASC) VISIBLE,
  INDEX `fk_device_port1_idx` (`up_port_id` ASC) VISIBLE,
*/

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // 1. creates index for column `parent_ip_id`
        $this->createIndex(
            'idx-device-mng_ip_id',
            'device',
            'mng_ip_id'
        );

        // add foreign key for table `device`
/*        $this->addForeignKey(
            'fk-device-mng_ip_id',
            'device',
            'mng_ip_id',
            'ip',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
*/
        // 2. creates index for column `parent_port_id`
        $this->createIndex(
            'idx-device-up_port_id',
            'device',
            'up_port_id'
        );

        // add foreign key for table `device`
/*        $this->addForeignKey(
            'fk-device-up_port_id',
            'device',
            'up_port_id',
            'port',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
*/        // 3. creates index for column `parent_vlan_id`
        $this->createIndex(
            'idx-device-mng_vlan_id',
            'device',
            'mng_vlan_id'
        );

        // add foreign key for table `device`
        $this->addForeignKey(
            'fk-device-mng_vlan_id',
            'device',
            'mng_vlan_id',
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
            'fk-device-mng_vlan_id',
            'device'
        );
        // drops index for column `parent_vlan_id`
        $this->dropIndex(
            'idx-device-mng_vlan_id',
            'device'
        );
        // 2. drops foreign key for table `device`
        $this->dropForeignKey(
            'fk-device-up_port_id',
            'device'
        );
        // drops index for column `parent_port_id`
        $this->dropIndex(
            'idx-device-up_port_id',
            'device'
        );
        // 3. drops foreign key for table `device`
        $this->dropForeignKey(
            'fk-device-mng_ip_id',
            'device'
        );
        // drops index for column `parent_ip_id`
        $this->dropIndex(
            'idx-device-mng_ip_id',
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
