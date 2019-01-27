<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'service_id'], 'integer'],
            [['number', 'abonent', 'address', 'description', 'ipName', 'subnetName', 'vlanName', 'portName', 'deviceName', 'serviceName'], 'safe'],
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
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
 
/*        $dataProvider->setSort([
            'attributes' => [
                'abonent',
                'address',
                'description',
            ]
        ]);
*/
        $dataProvider->sort->attributes['abonent'] = [
                    'asc' => ['abonent' => SORT_ASC],
                    'desc' => ['abonent' => SORT_DESC,],
                ];

        $query->joinWith('ips')->joinWith('ips.subnet');
        $dataProvider->sort->attributes['ipName'] = [
                    'asc' => ['ip.iplong' => SORT_ASC],
                    'desc' => ['ip.iplong' => SORT_DESC,],
                ];

        $query->joinWith('vlans');
        $dataProvider->sort->attributes['vlanName'] = [
                    'asc' => ['vlan.number' => SORT_ASC],
                    'desc' => ['vlan.number' => SORT_DESC,],
                ];

        $query->joinWith('ports')->joinWith('ports.device');
        $dataProvider->sort->attributes['portName'] = [
                    'asc' => ['port.number' => SORT_ASC],
                    'desc' => ['port.number' => SORT_DESC,],
                ];

                //сортировка по device ПОКА НЕ РАБОТАЕТ
/*        $dataProvider->sort->attributes['deviceName'] = [
                    'asc' => ['port.device.mngIp.strip' => SORT_ASC],
                    'desc' => ['port.device.mngIp.strip' => SORT_DESC,],
                ];
*/

                //сортировка по subnet ПОКА НЕ РАБОТАЕТ
/*        $dataProvider->sort->attributes['subnetName'] = [
                    'asc' => ['ip.subnet.name' => SORT_ASC],
                    'desc' => ['ip.subnet.name' => SORT_DESC,],
                ];
*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            // $query->joinWith(['ip']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'service_id' => $this->service_id,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'abonent', $this->abonent])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'description', $this->description]);


        $query->andFilterWhere(['like', 'port.number', $this->portName])
        ->andFilterWhere(['like', 'INET_NTOA(ip.iplong)', $this->ipName])
        ->andFilterWhere(['like', 'vlan.number', $this->vlanName]);


        return $dataProvider;
    }
}
