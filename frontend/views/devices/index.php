<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Устройства';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать устройство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'alias',
                'label' => 'Обозначение',
                'value' => 'alias',
            ],
            [
                'attribute' => 'modeldevice',
                'label' => 'Модель',
                'value' => 'modeldevice',
            ],
            [
                'attribute' => 'roledevice',
                'label' => 'Функционал',
                'value' => 'roledevice',
            ],
            [
                'attribute' => 'discription',
                'label' => 'Описание',
                'value' => 'discription',
            ],
            [
                'attribute' => 'area_id',
                'label' => 'Область',
                'value' => 'area.name',
                'filter' => $arrArea,
            ],
            'parent_ip_id',
            'parent_port_id',
            'parent_vlan_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
