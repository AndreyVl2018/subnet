<?php
// include 'lib.php';

$url = \yii\helpers\Url::to(['portlist']);

use common\models\Device;
use common\models\Port;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
// use yii\helpers\ArrayHelper;
use yii\helpers\Url;
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

    <?= $form->field($model, 'service_id')->dropDownList($arrService)->label('Service') ?>
  
    <?php 
    
        if (!$model->isNewRecord && isset($model->service_id)) {

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
                $deviceName = $model->devices[0]->id;
                        foreach ($model->devices as $device) {
                            $result .= $device->nameDevice;
               } 
            } else {
                $deviceName = 0;
                $result = 'Select Device...';
            }

            echo $form->field($model, 'deviceName')->dropDownList($arrDevice, [
                'prompt' => $result,
                'onchange' => '$.post("/orders/portlist?id='.'"+$(this).val(), function (data) {
                    $("select#order-portnumber").html(data);
                });',
            ])->label('Device');


            // Child level 1 
            if (!empty($model->devices)) {
                $model_port = Port::find()->orderBy('device_id')->all();
                // $arrPort = ArrayHelper::map($model_port, 'id', 'number');
                $arrPort = [];
                foreach ($model_port as $value) {
                    if ($value->device_id = $model->deviceName) {
                        # code...
                        $arrPort[$value->id] = $value->number;
                    }
                }
                if (!empty($model->ports))
                {
                    $model_port = [$model->portNumber => $model->ports[0]->number];
                    unset($arrPort[$model->portNumber]); // обнуление старого порта
                    $model_port = $model_port + ['' => 'Select...'];
                    $portNumber = $model->ports[0]->id;
                }
                else
                {
                    $model_port = ['' => 'Select...'];
                    $portNumber = 0;
                }

                $model_port = $model_port + $arrPort;
            }
            else
                $model_port = ['' => 'Select...'];

            echo $form->field($model, 'portNumber')->dropDownList($model_port)->label('Port');

if (0) {
    # code...

// echo $form->dropDownList('portNumber','', array(), array('prompt'=>'Select port...'));


}

            if (0) {
            echo $form->field($model, 'portNumber')->widget(DepDrop::classname(), [
                'options' => ['id' => 'subcat-id'],
                'data' => $model_port,
                'pluginOptions' => [
                    'depends' => ['cat-id'],
                    'placeholder' => 'Select...',
                    'url'=>Url::to(['/order/portlist']),
                ]
            ]);
        }

    // pr($model);
    // pr($model_port);

    } ?>
      
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
