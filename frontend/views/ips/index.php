<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'iplong',
            'strip',
/*            [
                'attribute' => 'INET_NTOA(iplong)',
                'label' => 'Ip',
                // 'format' => 'paragraphs',
                'value' => 'strip'
            ],
*/            'subnet_id',
            'orderName',
            // 'order_id',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
