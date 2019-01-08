<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DeviceList2 */

$this->title = 'Create Device List2';
$this->params['breadcrumbs'][] = ['label' => 'Device List2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-list2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
