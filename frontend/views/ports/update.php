<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Port */

$this->title = 'Изменение порта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Порты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="port-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
