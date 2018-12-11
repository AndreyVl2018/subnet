<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subnet".
 *
 * @property int $id
 * @property string $name
 * @property string $discription
 * @property string $gateway
 * @property string $mask
 * @property string $firstip
 * @property string $lastip
 * @property int $area_id
 *
 * @property Ip[] $ips
 * @property Area $area
 */
class Subnet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subnet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['discription'], 'string', 'max' => 255],
            [['gateway', 'mask', 'firstip', 'lastip'], 'string', 'max' => 15],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'discription' => 'Discription',
            'gateway' => 'Gateway',
            'mask' => 'Mask',
            'firstip' => 'Firstip',
            'lastip' => 'Lastip',
            'area_id' => 'Area ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIps()
    {
        return $this->hasMany(Ip::className(), ['subnet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }
}
