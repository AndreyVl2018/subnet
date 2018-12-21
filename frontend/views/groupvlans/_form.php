<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Groupvlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groupvlan-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Наименование') ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'firstvlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastvlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_id')->dropDownList($arrArea)->label('Область') ?>

   <?php if (!$model->isNewRecord):?>

    <h2>VLAN</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getVlans(),
                'pagination' => false
            ]),
        'columns' => [
            [
                'label' => 'Номер',
                'value' => 'number'
            ],
            [
                'label' => 'Описание',
                'value' => 'discription'
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'controller' => 'vlans',
                'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить', ['..\vlans\create', 'relation_id' => $model->id]),
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
