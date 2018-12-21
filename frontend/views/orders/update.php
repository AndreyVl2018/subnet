<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Изменение подключения: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Подключения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrArea' => $arrArea,
        'arrService' => $arrService,
        'arrGroupvlan' => $arrGroupvlan
    ]) ?>

</div>
