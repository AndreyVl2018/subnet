<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subnet".
 *
 * @property int $id
 * @property string $subnet
 * @property string $gateway
 * @property string $mask
 * @property string $region
 * @property int $bras
 *
 * @property Client[] $clients
 * @property Bras $bras0
 */
class VardaSubnet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subnet';
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
            [['subnet', 'gateway', 'mask', 'region', 'bras'], 'required'],
            [['subnet', 'gateway', 'mask', 'region'], 'string'],
            [['bras'], 'integer'],
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
            'subnet' => 'Subnet',
            'gateway' => 'Gateway',
            'mask' => 'Mask',
            'region' => 'Region',
            'bras' => 'Bras',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['subnet' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBras0()
    {
        return $this->hasOne(Bras::className(), ['id' => 'bras']);
    }
}
