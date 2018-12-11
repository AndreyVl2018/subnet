<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "groupvlan".
 *
 * @property int $id
 * @property string $name
 * @property string $discription
 * @property string $firstvlan
 * @property string $lastvlan
 * @property int $area_id
 *
 * @property Area $area
 * @property Vlan[] $vlans
 */
class Groupvlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groupvlan';
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
            [['firstvlan', 'lastvlan'], 'string', 'max' => 15],
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
            'firstvlan' => 'Firstvlan',
            'lastvlan' => 'Lastvlan',
            'area_id' => 'Area ID',
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
    public function getVlans()
    {
        return $this->hasMany(Vlan::className(), ['groupvlan_id' => 'id']);
    }
}
