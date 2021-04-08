<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addresses';
$this->params['breadcrumbs'][] = ['label' => 'My Page', 'url' => Url::toRoute('site/area')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //['attribute' => 'user_id', 'label' => 'User'],
            'postcode',
            'country',
            'city',
            'street',
            'house_number',
            'apartment_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
