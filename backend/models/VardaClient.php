<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $ip
 * @property string $client_fio
 * @property string $client_address
 * @property string $service
 * @property int $subnet
 * @property int $commutator
 * @property int $vlan
 * @property string $port
 * @property string $description
 * @property int $type_client
 * @property int $provider
 * @property string $create_date
 * @property string $end_date
 *
 * @property Commutator $commutator0
 * @property Subnet $subnet0
 * @property Vlan $vlan0
 */
class VardaClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('vardaDB');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'client_fio', 'client_address', 'service', 'subnet', 'commutator', 'vlan', 'port', 'description', 'type_client', 'provider'], 'required'],
            [['ip', 'client_fio', 'client_address', 'service', 'port', 'description'], 'string'],
            [['subnet', 'commutator', 'vlan', 'type_client', 'provider'], 'integer'],
            [['create_date', 'end_date'], 'safe'],
            [['commutator'], 'exist', 'skipOnError' => true, 'targetClass' => Commutator::className(), 'targetAttribute' => ['commutator' => 'id']],
            [['subnet'], 'exist', 'skipOnError' => true, 'targetClass' => Subnet::className(), 'targetAttribute' => ['subnet' => 'id']],
            [['vlan'], 'exist', 'skipOnError' => true, 'targetClass' => Vlan::className(), 'targetAttribute' => ['vlan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'client_fio' => 'Client Fio',
            'client_address' => 'Client Address',
            'service' => 'Service',
            'subnet' => 'Subnet',
            'commutator' => 'Commutator',
            'vlan' => 'Vlan',
            'port' => 'Port',
            'description' => 'Description',
            'type_client' => 'Type Client',
            'provider' => 'Provider',
            'create_date' => 'Create Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommutator0()
    {
        return $this->hasOne(Commutator::className(), ['id' => 'commutator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubnet0()
    {
        return $this->hasOne(Subnet::className(), ['id' => 'subnet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVlan0()
    {
        return $this->hasOne(Vlan::className(), ['id' => 'vlan']);
    }
}
