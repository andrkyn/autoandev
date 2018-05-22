<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Color', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'code',
                'format' => 'html',
                'label'=> 'Name',
                'value' => function($data) {
                    return Html::tag('span', $data->code,
                        ['class' => 'label label-', 'style' => 'color: black;background-color: white' ]);
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'text-align: center; width: 100px; background-color:#' . $model->code];
                },
            ],
            [
                'attribute' => 'is_enabled',
                'value'=> function ($model) {
                    $data = $model->is_enabled === 1;
                     return Html::tag('span', $data ? 'On' : 'Off',
                         ['class' => 'label label-' . ($data? 'success' : 'danger'),]
                     );
                },
                'format' => 'html',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
