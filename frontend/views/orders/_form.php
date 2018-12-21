<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true])->label('Номер заказа') ?>

    <?= $form->field($model, 'abonent')->textInput(['maxlength' => true])->label('Ф И О') ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true])->label('Адрес') ?>

    <?= $form->field($model, 'service_id')->dropDownList($arrService)->label('Услуга') ?>

    <?= $form->field($model, 'area_id')->dropDownList($arrArea)->label('Область') ?>

    <?= $form->field($model, 'groupvlan')->dropDownList($arrGroupvlan)->label('Группы VLAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
