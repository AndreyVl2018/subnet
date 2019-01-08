<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VardaClientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="varda-client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'client_fio') ?>

    <?= $form->field($model, 'client_address') ?>

    <?= $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'subnet') ?>

    <?php // echo $form->field($model, 'commutator') ?>

    <?php // echo $form->field($model, 'vlan') ?>

    <?php // echo $form->field($model, 'port') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'type_client') ?>

    <?php // echo $form->field($model, 'provider') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
