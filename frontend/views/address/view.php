<?php

use common\models\Address;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Address */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Page', 'url' => Url::toRoute('site/area')];
$this->params['breadcrumbs'][] = ['label' => 'My Addresses', 'url' => ['address/myaddresses']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="address-view">

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
            'postcode',
            'country',
            'city',
            'street',
            'house_number',
            'apartment_number',
        ],
    ]) ?>

</div>
