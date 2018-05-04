<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */

$categories = \common\models\Category::find()->all();
$brands = \common\models\Brand::find()->all();
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brandId')->dropDownList(ArrayHelper::map($brands, 'id', 'name'), ['prompt' => 'Select Brand']) ?>

    <?= $form->field($model, 'categoryId')->dropDownList(ArrayHelper::map($categories, 'id', 'name'), ['prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'content')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput() ?>

    <?= $form->field($model, 'transmission')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'speed')->textInput() ?>

    <?= $form->field($model, 'fuelConsumption')->textInput() ?>

    <?= $form->field($model, 'drive')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'trunkVolume')->textInput() ?>

    <?= $form->field($model, 'bodyStyle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?php // $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
