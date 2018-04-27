<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brandId')->textInput() ?>

    <?= $form->field($model, 'categoryId')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput() ?>

    <?= $form->field($model, 'transmission')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'speed')->textInput() ?>

    <?= $form->field($model, 'fuelConsumption')->textInput() ?>

    <?= $form->field($model, 'drive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trunkVolume')->textInput() ?>

    <?= $form->field($model, 'bodyStyle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upDate')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
