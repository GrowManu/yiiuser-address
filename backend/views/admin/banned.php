<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banned users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-banned">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'username',
            'name',
            'surname',
            //'sex',
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{unban}',
                'buttons' => [
                    'unban' => function($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-check"></span>', 
                    $url);
                    }
                ],
            ],
        ],
    ]);
    ?>

<?php Pjax::end(); ?>

</div>