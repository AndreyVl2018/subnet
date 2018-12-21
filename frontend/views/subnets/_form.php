<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subnet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subnet-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Наименование') ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'gateway')->textInput(['maxlength' => true])->label('Шлюз') ?>

    <?= $form->field($model, 'mask')->textInput(['maxlength' => true])->label('Маска') ?>

    <?= $form->field($model, 'firstip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_id')->dropDownList($arrArea)->label('Область')?>

   <?php if (!$model->isNewRecord):?>

    <h2>IP</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getIps(),
                'pagination' => false
            ]),
        'columns' => [
            'iplong',
            [
                'label' => 'IP',
                'value' => 'ipstr'
            ],
            [
                'label' => 'Подсеть',
                'value' => 'subnet_id'
            ],
            [
                'label' => 'Заказ',
                'value' => 'order_id'
            ],
            [
                'label' => 'Статус',
                'value' => 'status'
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'controller' => 'ips',
                'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить', ['..\ips\create', 'relation_id' => $model->id]),
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
