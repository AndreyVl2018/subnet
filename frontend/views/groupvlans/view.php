<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Groupvlan */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Группы VLAN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="groupvlan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы хотите удалить эту позицию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            ['label' => 'Наименование группы', 'value' => $model->name],
            ['label' => 'Описание', 'value' => $model->discription],
            ['label' => 'Область', 'value' => $model->area->name],
            ['label' => 'Первый VLAN', 'value' => $model->firstvlan],
            ['label' => 'Последний VLAN', 'value' => $model->lastvlan],
        ],
    ]) ?>

</div>
