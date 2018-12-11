<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GroupvlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groupvlans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupvlan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Groupvlan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'discription',
            'firstvlan',
            'lastvlan',
            //'area_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
