<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'postcode') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house_number') ?>

    <?php // echo $form->field($model, 'apartment_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
