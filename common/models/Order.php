<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $number
 * @property string $abonent
 * @property string $adress
 * @property int $service_id
 * @property int $area_id
 *
 * @property Ip[] $ips
 * @property Area $area
 * @property Service $service
 * @property Port[] $ports
 * @property Vlan[] $vlans
 */
class Order extends \yii\db\ActiveRecord
{
    public $groupvlan;
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
            [['service_id', 'area_id'], 'integer'],
            [['number', 'groupvlan'], 'string', 'max' => 100],
            [['abonent', 'adress'], 'string', 'max' => 255],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
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
            'adress' => 'Adress',
            'service_id' => 'Service ID',
            'area_id' => 'Area ID',
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
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorts()
    {
        return $this->hasMany(Port::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVlans()
    {
        return $this->hasMany(Vlan::className(), ['order_id' => 'id']);
    }
 /*
    public function getGroupvlan()
    {
        foreach ($this->area->groupvlans as $value) {
            $arrGroupvlan[$value->id] = $value->name;
        }
        echo "Я здесь !!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
        return $arrGroupvlan;
    }
    */
}
