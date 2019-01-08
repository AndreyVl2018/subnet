<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subnet".
 *
 * @property int $id
 * @property double $ip
 * @property int $mask
 * @property double $gateway
 * @property string $name
 * @property string $description
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
            [['ip', 'gateway'], 'number'],
            [['mask', 'area_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
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
            'ip' => 'Ip',
            'mask' => 'Mask',
            'gateway' => 'Gateway',
            'name' => 'Name',
            'description' => 'Description',
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
