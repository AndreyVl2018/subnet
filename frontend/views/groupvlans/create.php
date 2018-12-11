<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Groupvlan */

$this->title = 'Create Groupvlan';
$this->params['breadcrumbs'][] = ['label' => 'Groupvlans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupvlan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
