<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vlan".
 *
 * @property int $id
 * @property string $number
 * @property string $discription
 * @property int $groupvlan_id
 * @property int $order_id
 * @property int $status
 *
 * @property Device[] $devices
 * @property Groupvlan $groupvlan
 * @property Order $order
 */
class Vlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vlan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['groupvlan_id', 'order_id', 'status'], 'integer'],
            [['number'], 'string', 'max' => 100],
            [['discription'], 'string', 'max' => 255],
            [['groupvlan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groupvlan::className(), 'targetAttribute' => ['groupvlan_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
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
            'discription' => 'Discription',
            'groupvlan_id' => 'Groupvlan ID',
            'order_id' => 'Order ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::className(), ['parent_vlan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupvlan()
    {
        return $this->hasOne(Groupvlan::className(), ['id' => 'groupvlan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
