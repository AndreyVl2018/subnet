<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device_list2".
 *
 * @property int $id
 * @property string $alias
 * @property string $roledevice
 * @property int $area_id
 * @property string $address
 * @property string $modeldevice
 * @property string $description
 * @property double $mng_ip
 * @property int $mng_vlan
 * @property string $up_port
 * @property double $up_device
 */
class DeviceList2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_list2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area_id', 'mng_vlan'], 'integer'],
            [['mng_ip', 'up_device'], 'number'],
            [['alias', 'roledevice', 'modeldevice'], 'string', 'max' => 100],
            [['address', 'description'], 'string', 'max' => 255],
            [['up_port'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'roledevice' => 'Roledevice',
            'area_id' => 'Area ID',
            'address' => 'Address',
            'modeldevice' => 'Modeldevice',
            'description' => 'Description',
            'mng_ip' => 'Mng Ip',
            'mng_vlan' => 'Mng Vlan',
            'up_port' => 'Up Port',
            'up_device' => 'Up Device',
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }
}
