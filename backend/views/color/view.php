<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Color */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' =>'name',
                'format' => 'html',
                'value' => function($data) {
                    return Html::tag('span', $data->name,
                        ['class' => 'label label-', 'style' => 'color: black;background-color: white' ]);
                },
                'contentOptions' => ['style' => 'background-color:#' . $model->code],
            ],
            'code',
            [
                'attribute' => 'is_enabled',
                'value'=> function ($model) {
                    $data = $model->is_enabled === 1;
                    return \yii\helpers\Html::tag('span', $data ? 'On' : 'Off',
                        ['class' => 'label label-' . ($data? 'success' : 'danger'),]
                    );
                },
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
