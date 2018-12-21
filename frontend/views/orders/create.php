<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Создание подключения';
$this->params['breadcrumbs'][] = ['label' => 'Подключения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrArea' => $arrArea,
        'arrService' => $arrService
    ]) ?>

</div>
