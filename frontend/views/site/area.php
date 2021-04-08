<?php

/* @var $this View */

$this->title = 'Address Base';

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;


?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Personal page</h1>
    </div>

    <div class="body-content" >
        <div class="row">
                <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'name',
            'surname',
            'email',
            [
            'label' => 'Sex',
            'value' => function($model) {
                if ($model->sex == 0) {
                    return 'no information';
                } elseif ($model->sex == 1) {
                    return 'male';
                }
                return 'female';
            },
            ],
            'created_at:datetime',
        ],            
    ]) ?>
            <div class="col-lg-4">
                <?= Html::a('My addresses', ['address/myaddresses'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::a('Other Users', ['user/index'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::a('Change the data', ['user/update'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>
</div>
