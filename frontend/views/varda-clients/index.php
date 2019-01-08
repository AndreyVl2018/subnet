<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VardaClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Varda Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varda-client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Varda Client', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip:ntext',
            'client_fio:ntext',
            'client_address:ntext',
            'service:ntext',
            //'subnet',
            //'commutator',
            //'vlan',
            //'port:ntext',
            //'description:ntext',
            //'type_client',
            //'provider',
            //'create_date',
            //'end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
