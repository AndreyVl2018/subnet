<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subnet */

$this->title = 'Update Subnet: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subnets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subnet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
