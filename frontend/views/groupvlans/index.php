<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GroupvlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Группы VLAN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupvlan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать группу VLAN', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'name',
                'label' => 'Наименование',
                'value' => 'name',
            ],
            [
                'attribute' => 'firstvlan',
                'label' => 'Первый VLAN',
                'value' => 'firstvlan',
            ],
            [
                'attribute' => 'lastvlan',
                'label' => 'Последний VLAN',
                'value' => 'lastvlan',
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

            [   
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
</div>
