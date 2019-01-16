<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'number',
            //'service_id',
            [
                'attribute' => 'ipName',
                'label' => 'Ip',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ips as $ip) {
                            $result .= $ip->strip . "\n\n";
                        }
                        return $result;
                    }
            ],
            'abonent',
            'address',
            // 'description',
            [
                // 'attribute' => 'subnetName',
                'label' => 'Subnet',
                // 'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ips as $ip) {
                            $result .= $ip->subnet->name . "\n\n";
                        }
                        return $result;
                    }
            ],
             // 'vlan'
            [
                'attribute' => 'vlanName',
                'label' => 'VLAN',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->vlans as $vlan) {
                            $result .= $vlan->number . "\n\n";
                        }
                        return $result;
                    }
            ],
            // 'device'
            [
                // 'attribute' => 'deviceName',
                'label' => 'Device',
                // 'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->devices as $device) {
                            // $result .= $port->device->mngIp->strip . "\n\n";
                            $result .= $device->nameDevice . "\n\n";
                        }
                        return $result;
                    }
            ],
            // 'port'
            [
                'attribute' => 'portName',
                'label' => 'Port',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ports as $port) {
                            $result .= $port->number . "\n\n";
                        }
                        return $result;
                    }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
