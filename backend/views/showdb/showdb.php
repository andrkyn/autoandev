<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->title = 'Show data base';
$this->params['breadcrumbs'][] = $this->title;
//print_r(Yii::app()->db->getStats());

?>

<div class="brand-index">">
    <div class="row content">

        <h1>show autoDB</h1>

        <?php
        foreach ($cats as $cat) {
            echo '<ul>';
            echo '<li>' . $cat->name . '</li>';
            $modelcars = $cat->cars;
            foreach ($modelcars as $product) {
                echo '<ul>';
                echo '<li>' . $product->name . '</li>';
                echo '</ul>';
            }
            echo '</ul>';
        }
        ?>


    </div>
</div>