<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'brandId',
            [
                'attribute' => 'brandId',
                'value' => function ($data) {
                    return $data->brand->name;
                }
            ],
            //'categoryId',
            /*[
                'attribute' =>'categoryId',
                'value' => function($data) {
                    return $data->category->name;
                }
            ],*/
            'year',
            'engine',
            [
                'attribute' => 'colorId',
                'format' => 'html',
                'value' => function ($data) {
                    if (!isset($data->color->name)) {
                        return Html::tag('span', 'not color',
                            ['class' => 'label label-', 'style' => 'color:black; background-color:white']);
                    } else {
                        return Html::tag('span', $data->color->name,
                            ['class' => 'label label-', 'style' => 'color:black; background-color:white']);
                    }
                },
                'contentOptions' => function ($data) {
                    if (!isset($data->color->code)) {
                        return ['style' => 'text-align:center; width:100px; background-color:white'];
                    } else {
                        return ['style' => 'text-align:center; width:100px; background-color:#' . $data->color->code];
                    }
                },
            ],
            //'img',
            [
                'attribute' => 'img',
                'format' => 'html',
                //'value' =>Html::img("@web/images/{$model->img}", ['alt' => $model->name]),
                'value' => function ($data) {
                    return Html::img('@web/images/' . $data['img'], ['width' => '100px', 'height' => '80px']);
                    //function($data) {
                    //return Html::img(Yii::getAlias('@web').'/images/'. $data['img'], ['width' => '70px']);
                },
            ],
            'date:datetime',
            'date_modified:datetime',
            'description',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
