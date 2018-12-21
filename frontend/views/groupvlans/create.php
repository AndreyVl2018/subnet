<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Groupvlan */

$this->title = 'Создание группы VLAN';
$this->params['breadcrumbs'][] = ['label' => 'Группа VLAN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupvlan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrArea' => $arrArea
    ]) ?>

</div>
