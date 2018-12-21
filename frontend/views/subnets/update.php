<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subnet */

$this->title = 'Изменение подсети: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Подсети', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="subnet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrArea' => $arrArea
    ]) ?>

</div>
