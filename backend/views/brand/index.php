<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use common\models\Brand;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Brand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'img',
            [
                'attribute'=>'img',
                'format' => 'html',
                //'value' =>Html::img("@web/images/{$model->img}", ['alt' => $model->name]),
                'value'=> function($data){
                    return Html::img('@web/images/' . $data['img'], ['width' => '100px', 'height' => '80px']);

                    //function($data) {
                    //return Html::img(Yii::getAlias('@web').'/images/'. $data['img'], ['width' => '70px']);
                },
            ],
            'date',
            'slug',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
