<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vlan".
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property int $bras
 *
 * @property Client[] $clients
 * @property Bras $bras0
 */
class VardaVlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vlan';
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
            [['number', 'name'], 'required'],
            [['number', 'bras'], 'integer'],
            [['name'], 'string'],
            [['bras'], 'exist', 'skipOnError' => true, 'targetClass' => Bras::className(), 'targetAttribute' => ['bras' => 'id']],
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
            'name' => 'Name',
            'bras' => 'Bras',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['vlan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBras0()
    {
        return $this->hasOne(Bras::className(), ['id' => 'bras']);
    }
}
