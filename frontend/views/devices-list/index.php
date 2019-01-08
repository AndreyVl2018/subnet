<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DeviceListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Device Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Device List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'address',
            'modeldevice',
            'description',
            'mng_ip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
