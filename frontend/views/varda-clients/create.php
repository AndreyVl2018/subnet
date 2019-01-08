<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VardaClient */

$this->title = 'Create Varda Client';
$this->params['breadcrumbs'][] = ['label' => 'Varda Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varda-client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
