<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<h3> This brand automobile</h3>

    <div class="row content">
        <?php if (!empty($brands)): ?>
            <?php foreach ($brands as $brand): ?>
                 <ul>
                     <a href="#" class="product_title"><?= $brand->name ?></a>
                 </ul>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>
