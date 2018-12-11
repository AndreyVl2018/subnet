<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iplong')->textInput() ?>

    <?= $form->field($model, 'ipstr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subnet_id')->textInput() ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
