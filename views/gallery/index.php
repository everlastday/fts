<?php
$this->title = 'Фотогалерея';

use app\assets\FancyAsset;
FancyAsset::register($this);


?>

<div class="page-container">
    <div class="fts-breadcrums">
        <!-- <a class="home" href="#">На головну</a> / Вхід в магазин / Реєстрація -->
    </div>


    <div class="galery">

        <?php  foreach ($gallery_images as $image): ?>

        <a class="fancybox" rel="group" title="<?=(isset($image['title'])) ? $image['title'] : ''?>" href="<?=Yii::$app->request->hostInfo . '/uploads/gallerys/' . $image['img']?>">
            <img src="<?=Yii::$app->request->hostInfo . '/uploads/gallerys/small_' . $image['img']?>" width="150" height="150">
        </a>

        <?php endforeach; ?>

    </div>

</div>
