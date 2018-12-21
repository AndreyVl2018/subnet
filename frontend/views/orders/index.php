<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подключения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Подключение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

/*            [
                'attribute' => 'number',
                'label' => 'Номер',
                'value' => 'number',
            ],
*/            [
                'attribute' => 'abonent',
                'label' => 'Ф И О',
                'value' => 'abonent',
            ],
            [
                'attribute' => 'adress',
                'label' => 'Адрес',
                'value' => 'adress',
            ],
/*            [
                'attribute' => 'ip.ipstr',
                'label' => 'IP адрес',
                'value' => 'ip.ipstr',
//                'filter' => $arrArea,
            ],
            [
                'attribute' => 'vlan.number',
                'label' => 'VLAN',
                'value' => 'vlan.number',
//                'filter' => $arrArea,
            ],
            [
                'attribute' => 'device.alias',
                'label' => 'Устройство',
                'value' => 'device.alias',
//                'filter' => $arrArea,
            ],
            [
                'attribute' => 'port.number',
                'label' => 'Порт',
                'value' => 'port.number',
//                'filter' => $arrArea,
            ],
  */          [
                'attribute' => 'service_id',
                'label' => 'Услуга',
                'value' => 'service_id',
                'filter' => $arrService,
            ],
            [
                'attribute' => 'area_id',
                'label' => 'Область',
                'value' => 'area.name',
                'filter' => $arrArea,
            ],
            [
//                'attribute' => 'area.groupvlans.name',
                'label' => 'ГруппЫ VLAN',
                'format' => 'paragraphs',
                'value' => function ($model) {
                    $result = '';
                    foreach ($model->area->groupvlans as $groupvlan) {
                        # code...
                        $result .= $groupvlan->name . "\n\n";
                    }
                    return $result;
                }
//                'filter' => $arrArea,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
