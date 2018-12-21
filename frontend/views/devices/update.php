<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Device */

$this->title = 'Изменение устройства: ' . $model->alias;
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alias, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="device-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrArea' => $arrArea
    ]) ?>

</div>
