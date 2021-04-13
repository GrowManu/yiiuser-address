<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron">
    <h1>Admin page</h1>
</div>

<div class="body-content" >
    <div class="row">
        <div class="col-md-10">
            <?= Html::a('Users', ['admin/users'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-lg-auto">
            <?= Html::a('Banned users', ['admin/banned'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>