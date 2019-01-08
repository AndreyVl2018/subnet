<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "commutator".
 *
 * @property int $id
 * @property string $ip
 * @property int $model
 * @property string $switch_address
 * @property string $up
 * @property string $up_port
 * @property string $description
 *
 * @property Client[] $clients
 * @property CommutatorModel $model0
 * @property CommutatorTransit[] $commutatorTransits
 */
class VardaCommutator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commutator';
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
            [['ip', 'model', 'switch_address', 'up', 'up_port', 'description'], 'required'],
            [['ip', 'switch_address', 'up', 'up_port', 'description'], 'string'],
            [['model'], 'integer'],
            [['model'], 'exist', 'skipOnError' => true, 'targetClass' => CommutatorModel::className(), 'targetAttribute' => ['model' => 'id']],
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
            'model' => 'Model',
            'switch_address' => 'Switch Address',
            'up' => 'Up',
            'up_port' => 'Up Port',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(VardaClient::className(), ['commutator' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel0()
    {
        return $this->hasOne(VardaCommutatorModel::className(), ['id' => 'model']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommutatorTransits()
    {
        return $this->hasMany(CommutatorTransit::className(), ['commutator' => 'id']);
    }
}
