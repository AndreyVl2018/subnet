<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $alias
 * @property string $address
 * @property string $description
 * @property string $modeldevice
 * @property string $roledevice
 * @property int $area_id
 * @property int $mng_ip_id
 * @property int $up_port_id
 * @property int $mng_vlan_id
 *
 * @property Area $area
 * @property Ip $mngIp
 * @property Vlan $mngVlan
 * @property Port $upPort
 * @property Port[] $ports
 */
class Device extends \yii\db\ActiveRecord
{
    
    public $arrDevice;
    public $namedevice;
    // public $device_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id', 'mng_ip_id', 'up_port_id', 'mng_vlan_id'], 'integer'],
            [['alias', 'modeldevice', 'roledevice'], 'string', 'max' => 100],
            [['address', 'description'], 'string', 'max' => 255],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['mng_ip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ip::className(), 'targetAttribute' => ['mng_ip_id' => 'id']],
            [['mng_vlan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vlan::className(), 'targetAttribute' => ['mng_vlan_id' => 'id']],
            [['up_port_id'], 'exist', 'skipOnError' => true, 'targetClass' => Port::className(), 'targetAttribute' => ['up_port_id' => 'id']],
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
            'address' => 'Address',
            'description' => 'Description',
            'modeldevice' => 'Modeldevice',
            'roledevice' => 'Roledevice',
            'area_id' => 'Area ID',
            'mng_ip_id' => 'Mng Ip ID',
            'up_port_id' => 'Up Port ID',
            'mng_vlan_id' => 'Mng Vlan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMngIp()
    {
        return $this->hasOne(Ip::className(), ['id' => 'mng_ip_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMngVlan()
    {
        return $this->hasOne(Vlan::className(), ['id' => 'mng_vlan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpPort()
    {
        return $this->hasOne(Port::className(), ['id' => 'up_port_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorts()
    {
        return $this->hasMany(Port::className(), ['device_id' => 'id']);
    }

        public function getNamedevice()
    {
        return $this->mngIp->strip . "  (" . $this->description . ")\n\n";
    }


}
