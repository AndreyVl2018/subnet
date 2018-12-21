<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vlan */

$this->title = 'Изменение VLAN: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'VLANs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="vlan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
