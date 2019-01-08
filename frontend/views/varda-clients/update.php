<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VardaClient */

$this->title = 'Update Varda Client: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Varda Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="varda-client-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
