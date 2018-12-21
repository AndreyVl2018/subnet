<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vlan */

$this->title = 'Создать VLAN';
$this->params['breadcrumbs'][] = ['label' => 'VLANs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vlan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
