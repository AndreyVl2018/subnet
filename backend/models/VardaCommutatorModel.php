<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "commutator_model".
 *
 * @property int $id
 * @property string $name
 *
 * @property Bras[] $bras
 * @property Commutator[] $commutators
 */
class VardaCommutatorModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commutator_model';
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
            [['name'], 'required'],
            [['name'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBras()
    {
        return $this->hasMany(Bras::className(), ['model' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommutators()
    {
        return $this->hasMany(Commutator::className(), ['model' => 'id']);
    }
}
