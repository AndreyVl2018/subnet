<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ip;

/**
 * IpSearch represents the model behind the search form of `common\models\Ip`.
 */
class IpSearch extends Ip
{
    public $strip = '';
    public $orderName = '';
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subnet_id', 'order_id', 'status'], 'integer'],
            [['iplong'], 'number'],
            [['strip','orderName'], 'safe'],
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
        $query = Ip::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
        'attributes' => [
            'strip' => [
                'asc' => ['iplong' => SORT_ASC],
                'desc' => ['iplong' => SORT_DESC],
                'label' => 'Ip',
                'default' => SORT_ASC
                ],
            'orderName' => [
                'asc' => ['order.abonent' => SORT_ASC, 'order.address' => SORT_ASC],
                'desc' => ['order.abonent' => SORT_DESC, 'order.address' => SORT_DESC],
                'label' => 'Abonent',
                'default' => SORT_ASC
                ],
            ]
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

    // $this->addCondition($query, 'strip', true);


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'iplong' => $this->iplong,
            'subnet_id' => $this->subnet_id,
            'order_id' => $this->order_id,
            'status' => $this->status,
        ]);

        $query->andWhere(['like', 'INET_NTOA(iplong)', $this->strip]);
 
        $query->joinWith('order');
  
        $query->andWhere('order.abonent LIKE "%' . $this->orderName . '%" '.'OR order.address LIKE "%' . $this->orderName . '%"');
        
        return $dataProvider;
    }
}
