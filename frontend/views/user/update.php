<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'My Page', 'url' => ['site/area']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <h1><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'form-update']); ?>
    <div class="row">
        <div class="col-lg-5">

                <?= $form->field($model, 'email') ?>
            
                <?= $form->field($model, 'name') ?>
            
                <?= $form->field($model, 'surname') ?>
            
                <?= $form->field($model, 'sex')->dropDownList(['no information', 'male', 'female']) ?>
            
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>
            <?php ActiveForm::end(); ?>
</div>
