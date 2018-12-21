<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vlan-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true])->label('Номер') ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'groupvlan_id')->textInput()->label('Группа VLAN') ?>

    <?= $form->field($model, 'order_id')->textInput()->label('Заказ') ?>

    <?= $form->field($model, 'status')->textInput()->label('Статус') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
