<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true])->label('Обозначение') ?>

    <?= $form->field($model, 'modeldevice')->textInput(['maxlength' => true])->label('Модель') ?>

    <?= $form->field($model, 'roledevice')->textInput(['maxlength' => true])->label('Функционал') ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'area_id')->dropDownList($arrArea)->label('Область') ?>

    <?= $form->field($model, 'parent_ip_id')->textInput() ?>

    <?= $form->field($model, 'parent_port_id')->textInput() ?>

    <?= $form->field($model, 'parent_vlan_id')->textInput() ?>

    <?php if (!$model->isNewRecord):?>

    <h2>Порты</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getPorts(),
                'pagination' => false
            ]),
        'columns' => [
            [
                'label' => 'Номер',
                'value' => 'number'
            ],
            [
                'label' => 'Статус',
                'value' => 'status'
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'controller' => 'ports',
                'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить', ['..\ports\create', 'relation_id' => $model->id]),
                'template' => '{update}{delete}',
            ]
        ]
    ]);?>

    <?php endif?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
