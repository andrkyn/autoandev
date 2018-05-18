<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Car */

$this->title = 'Update Car: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'brands' => $brands,
        'categories' => $categories,
        'colors' => $colors,
    ]) ?>

</div>
