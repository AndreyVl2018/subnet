<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Port */

$this->title = 'Создать порт';
$this->params['breadcrumbs'][] = ['label' => 'Порты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="port-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
