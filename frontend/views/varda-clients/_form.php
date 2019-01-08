<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VardaClient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="varda-client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'client_fio')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'client_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'service')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'subnet')->textInput() ?>

    <?= $form->field($model, 'commutator')->textInput() ?>

    <?= $form->field($model, 'vlan')->textInput() ?>

    <?= $form->field($model, 'port')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type_client')->textInput() ?>

    <?= $form->field($model, 'provider')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
