<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DeviceList2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-list2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'roledevice') ?>

    <?= $form->field($model, 'area_id') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'modeldevice') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'mng_ip') ?>

    <?php // echo $form->field($model, 'mng_vlan') ?>

    <?php // echo $form->field($model, 'up_port') ?>

    <?php // echo $form->field($model, 'up_device') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
