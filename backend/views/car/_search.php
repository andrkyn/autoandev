<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brandId') ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'transmission') ?>

    <?php // echo $form->field($model, 'engine') ?>

    <?php // echo $form->field($model, 'speed') ?>

    <?php // echo $form->field($model, 'fuelConsumption') ?>

    <?php // echo $form->field($model, 'drive') ?>

    <?php // echo $form->field($model, 'trunkVolume') ?>

    <?php // echo $form->field($model, 'bodyStyle') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'upDate') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
