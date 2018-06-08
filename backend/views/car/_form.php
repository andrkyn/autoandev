<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brandId')->dropDownList(ArrayHelper::map($brands, 'id', 'name'), ['prompt' => '-Select Brand-']) ?>

    <?= $form->field($model, 'categoryId')->dropDownList(ArrayHelper::map($categories, 'id', 'name'), ['prompt' => '-Select Category-']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colorId')->dropDownList(ArrayHelper::map($colors, 'id', 'name'), ['prompt' => '-Select Color-']) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput() ?>

    <?php // $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
