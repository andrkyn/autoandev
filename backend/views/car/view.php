<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Car */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php //var_dump($codecol); ?>
<div class="car-view">
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
            'id',
            //'brandId',
            [
                'attribute' => 'brandId',
                'value' => function ($data) {
                return $data->brand->name;
                }
            ],
            //'categoryId',
            [
                'attribute' => 'categoryId',
                'value' => function ($data) {
                return $data->category->name;
                }
            ],
            'name',
            'slug',
            'engine',
            'year',
            [
                'attribute' => 'colorId',
                'format' => 'html',
                'value' => function ($data) {
                    if (isset($data->color)) {
                        return Html::tag('span', $data->color->name,
                            ['class' => 'label label-', 'style' => 'color:black; background-color:white']);
                    }else {
                        return Html::tag('span', 'not color');
                    }
                 },
                'contentOptions' => ['style' => 'color:black; background-color:#' . $codecol->code],
            ],
            //'img',
            [
                'attribute' => 'img',
                'format' => 'html',
                //'value' =>Html::img("@web/images/{$model->img}", ['alt' => $model->name]),
                'value' => function ($data) {
                    //return Html::img('@web/images/' . $data['img']);
                    return Html::img('/backend/web/images/' . $data->img);
                },

            ],
            'date:datetime',
            'date_modified:datetime',
            'description',
        ],
    ]) ?>

</div>

