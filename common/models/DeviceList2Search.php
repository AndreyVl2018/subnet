<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DeviceList2;

/**
 * DeviceList2Search represents the model behind the search form of `common\models\DeviceList2`.
 */
class DeviceList2Search extends DeviceList2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area_id', 'mng_vlan'], 'integer'],
            [['alias', 'roledevice', 'address', 'modeldevice', 'description', 'up_port'], 'safe'],
            [['mng_ip', 'up_device'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DeviceList2::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'area_id' => $this->area_id,
            'mng_ip' => $this->mng_ip,
            'mng_vlan' => $this->mng_vlan,
            'up_device' => $this->up_device,
        ]);

        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'roledevice', $this->roledevice])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'modeldevice', $this->modeldevice])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'up_port', $this->up_port]);

        return $dataProvider;
    }
}
