<?php

use common\models\AddressSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;
/* @var $this View */
/* @var $searchModel AddressSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'My Page', 'url' => Url::toRoute('site/area')];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => Url::toRoute('user/index')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-another_user">


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
            
        </div>
    </div>
</div>