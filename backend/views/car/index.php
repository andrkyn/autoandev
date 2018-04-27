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
            'brandId',
            'categoryId',
            'name',
            'title',
            //'content:ntext',
            //'price',
            //'transmission',
            //'engine',
            //'speed',
            //'fuelConsumption',
            //'drive',
            //'trunkVolume',
            //'bodyStyle',
            //'color',
            //'year',
            //'img',
            //'upDate',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
