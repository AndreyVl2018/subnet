<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device_list".
 *
 * @property int $id
 * @property string $address
 * @property string $modeldevice
 * @property string $description
 * @property double $mng_ip
 */
class DeviceList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['mng_ip'], 'number'],
            [['address', 'description'], 'string', 'max' => 255],
            [['modeldevice'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'modeldevice' => 'Modeldevice',
            'description' => 'Description',
            'mng_ip' => 'Mng Ip',
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }
}
