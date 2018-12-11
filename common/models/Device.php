<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $alias
 * @property string $modeldevice
 * @property string $roledevice
 * @property string $discription
 * @property int $area_id
 * @property int $parent_ip_id
 * @property int $parent_port_id
 * @property int $parent_vlan_id
 *
 * @property Area $area
 * @property Ip $parentIp
 * @property Port $parentPort
 * @property Vlan $parentVlan
 * @property Port[] $ports
 */
class Device extends \yii\db\ActiveRecord
{
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
            [['area_id', 'parent_ip_id', 'parent_port_id', 'parent_vlan_id'], 'integer'],
            [['alias', 'modeldevice', 'roledevice'], 'string', 'max' => 100],
            [['discription'], 'string', 'max' => 255],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['parent_ip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ip::className(), 'targetAttribute' => ['parent_ip_id' => 'id']],
            [['parent_port_id'], 'exist', 'skipOnError' => true, 'targetClass' => Port::className(), 'targetAttribute' => ['parent_port_id' => 'id']],
            [['parent_vlan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vlan::className(), 'targetAttribute' => ['parent_vlan_id' => 'id']],
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
            'modeldevice' => 'Modeldevice',
            'roledevice' => 'Roledevice',
            'discription' => 'Discription',
            'area_id' => 'Area ID',
            'parent_ip_id' => 'Parent Ip ID',
            'parent_port_id' => 'Parent Port ID',
            'parent_vlan_id' => 'Parent Vlan ID',
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
    public function getParentIp()
    {
        return $this->hasOne(Ip::className(), ['id' => 'parent_ip_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentPort()
    {
        return $this->hasOne(Port::className(), ['id' => 'parent_port_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentVlan()
    {
        return $this->hasOne(Vlan::className(), ['id' => 'parent_vlan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorts()
    {
        return $this->hasMany(Port::className(), ['device_id' => 'id']);
    }
}
