<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubnetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подсети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subnet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать подсеть', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => 'Наименование',
                'value' => 'name',
            ],
            [
                'attribute' => 'discription',
                'label' => 'Описание',
                'value' => 'discription',
            ],
            [
                'attribute' => 'gateway',
                'label' => 'Шлюз',
                'value' => 'gateway',
            ],
            [
                'attribute' => 'mask',
                'label' => 'Маска',
                'value' => 'mask',
            ],
            [
                'attribute' => 'firstip',
                'label' => 'Первый IP',
                'value' => 'firstip',
            ],
            [
                'attribute' => 'lastip',
                'label' => 'Последний IP',
                'value' => 'lastip',
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
