<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $number
 * @property string $abonent
 * @property string $address
 * @property string $description
 * @property int $service_id
 *
 * @property Ip[] $ips
 * @property Service $service
 * @property Port[] $ports
 * @property Vlan[] $vlans
 */
class Order extends \yii\db\ActiveRecord
{
    public $ipName = '';
    public $subnetName = '';
    public $vlanName = '';
    public $portName = '';
    public $deviceName = '';
    public $serviceName = '';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'integer'],
            [['number'], 'string', 'max' => 100],
            [['abonent', 'address', 'description'], 'string', 'max' => 255],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'abonent' => 'Abonent',
            'address' => 'Address',
            'description' => 'Description',
            'service_id' => 'Service ID',
            // 'device_id' => 'Device ID',
            'ipName' => 'Ip',
            'subnetName' => 'Subnet',
            'serviceName' => 'Service',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIps()
    {
        return $this->hasMany(Ip::className(), ['order_id' => 'id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    public function getServiceName()
    {
        return $this->service->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorts()
    {
        return $this->hasMany(Port::className(), ['order_id' => 'id']);
    }

    public function getDevices()
    {
        return $this->hasMany(Device::className(), ['id' => 'device_id'])->via('ports');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVlans()
    {
        return $this->hasMany(Vlan::className(), ['order_id' => 'id']);
    }

    public function afterFind()
    {
        return $this->deviceName = $this->device;
    }

}
