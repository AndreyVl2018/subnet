<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
 
/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abonent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->dropDownList($arrService)->label('Service') ?>

    <?= $form->field($model, 'deviceName')->widget(Select2::classname(), [
            'data' => $arrDevice,
            'value' => $model->abonent,
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберете Device ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <div class="web">
        <?php pr($model->deviceName);?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
