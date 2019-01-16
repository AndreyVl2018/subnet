<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'number',
            'abonent',
            'address',
            'description',
            [
                'label' => 'Service',
                'value' => $model->service->name,
            ],
            [
                'label' => 'Device',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ports as $port) {
/*                            $result .= $port->device->mngIp->strip . "  (" . $port->device->description . ")\n\n";
*/
                            $result .= $port->nameDevice;

                        }
                        return $result;
                    }
            ],
            [
                'label' => 'Port',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ports as $port) {
                            $result .= $port->number . "\n\n";
                        }
                        return $result;
                    }
            ],
            [
                'label' => 'VLAN',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->vlans as $vlan) {
                            $result .= $vlan->number . "\n\n";
                        }
                        return $result;
                    }
            ],
            [
                'label' => 'Ip',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ips as $ip) {
                            $result .= $ip->strip . "\n\n";
                        }
                        return $result;
                    }
            ],
            [
                'label' => 'Subnet',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->ips as $ip) {
                            $result .= $ip->subnet->name . "\n\n";
                        }
                        return $result;
                    }
            ],
/*            [
                'label' => 'Service',
                'value' => $model->service->name,
            ],
*/        ],
    ]) ?>

</div>
