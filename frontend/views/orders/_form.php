<?php
// include 'lib.php';

$url = \yii\helpers\Url::to(['portlist']);

use common\models\Service;
use common\models\Device;
use common\models\Port;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\assets\AppAsset;
// use yii\helpers\ArrayHelper;
// use app\common\models\Device;
 
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

    <?php

    $model_service = Service::find()->orderBy('name')->all();
    foreach ($model_service as $value) {
        $arrService[$value->id] = $value->name;
    }

    echo $form->field($model, 'service_id')->dropDownList($arrService)->label('Service'); 
    
    if (!$model->isNewRecord && isset($model->service_id)) {

        // Услуга: IP-access
        if ($model->service_id == 1) {

            // формируем список устройств
            $model_device = Device::find()->all();

            foreach ($model_device as $value) {
                $arrDeviceName[(string) $value->id.'-'] = $value->mngIp->strip . "  (" . $value->description . ")\n\n";
                $arrDeviceIp[(string) $value->id.'-'] = $value->mngIp->iplong;
            }

            // .. сортировка
            array_multisort($arrDeviceIp, SORT_ASC, $arrDeviceName);

            foreach ($arrDeviceName as $key => $value) {
                $arrDevice[(int) $key] = $value;
            }

            if (!empty($model->devices)) {
                $result = '';
                // $deviceName = $model->devices[0]->id;
                foreach ($model->devices as $device) {
                    $result .= $device->nameDevice;
                } 
            } else {
                // $deviceName = 0;
                $result = 'Select Device...';
            }

            echo $form->field($model, 'deviceName')->dropDownList($arrDevice, [
                    'prompt' => $result,
                    'onchange' => '$.post("/orders/portlist?id='.'"+$(this).val(), function (data) {
                        $("select#order-portnumber").html(data);
                    });',
                ])->label('Device');

            if (!empty($model->devices) && !empty($model->ports)) {

                $portNumber = $model->ports[0]->id;
                $model_port = [$model->portNumber => $model->ports[0]->number];
            } else {
                $portNumber = 0;
                $model_port = [$model->portNumber => '-'];
            }

            echo $form->field($model, 'portNumber')->dropDownList($model_port)->label('Port');
        }
    } 
    
    // pr($model->portNumber);
    // pr($model);

    ?>
      
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
