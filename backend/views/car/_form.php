<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="car-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'brandId')->dropDownList(ArrayHelper::map($brands, 'id', 'name'), ['prompt' => '-Select Brand-']) ?>

    <?= $form->field($model, 'categoryId')->dropDownList(ArrayHelper::map($categories, 'id', 'name'), ['prompt' => '-Select Category-']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colorId')->dropDownList(ArrayHelper::map($colors, 'id', 'name'), ['prompt' => '-Select Color-']) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'deleteUrl' => \yii\helpers\Url::toRoute(['car/delete-image', 'id' => $model->id]),
            'initialPreviewShowDelete' => true,
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => true,
            'pluginLoading' => true,
            'initialPreview' => [
                '<img src="' . $model->viewImage . '" class="file-preview-image">'
            ],
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
