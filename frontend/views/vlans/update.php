<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vlan */

$this->title = 'Update Vlan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vlans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vlan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
