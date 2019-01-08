<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DeviceList2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Device List2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-list2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Device List2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'alias',
            // 'roledevice',
            // 'area_id',
            'address',
            'modeldevice',
            // 'description',
            'mng_ip',
            'mng_vlan',
            'up_device',
            'up_port',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
