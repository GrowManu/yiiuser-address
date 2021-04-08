<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="row">
        <div class="col-lg-5">

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>
            
                <?= $form->field($model, 'name') ?>
            
                <?= $form->field($model, 'surname') ?>
            
                <?= $form->field($model, 'sex')->dropDownList(['no information', 'male', 'female']) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

               

            
        </div>
        <div class="col-lg-5">

                <?= $form->field($model, 'postcode')->textInput() ?>

                <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'house_number')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'apartment_number')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
            <?php ActiveForm::end(); ?>
</div>
