<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SubnetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subnet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'discription') ?>

    <?= $form->field($model, 'gateway') ?>

    <?= $form->field($model, 'mask') ?>

    <?php // echo $form->field($model, 'firstip') ?>

    <?php // echo $form->field($model, 'lastip') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
