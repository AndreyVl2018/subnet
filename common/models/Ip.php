<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip".
 *
 * @property int $id
 * @property double $iplong
 * @property string $ipstr
 * @property int $subnet_id
 * @property int $order_id
 * @property int $status
 *
 * @property Device[] $devices
 * @property Order $order
 * @property Subnet $subnet
 */
class Ip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iplong'], 'number'],
            [['subnet_id', 'order_id', 'status'], 'integer'],
            [['ipstr'], 'string', 'max' => 15],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['subnet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subnet::className(), 'targetAttribute' => ['subnet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iplong' => 'Iplong',
            'ipstr' => 'Ipstr',
            'subnet_id' => 'Subnet ID',
            'order_id' => 'Order ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::className(), ['parent_ip_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubnet()
    {
        return $this->hasOne(Subnet::className(), ['id' => 'subnet_id']);
    }

    public function beforeSave($insert) 
    {
        if ($this->isAttributeChanged('ipstr')) {
            $this->iplong = sprintf('%u', ip2long($this->ipstr));
        }

        return parent::beforeSave($insert);
    }


}
