<?php
$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $gallery['gallery_name'];
use app\assets\FancyAsset;

FancyAsset::register($this);



?>


    <div class="galery">

        <?php  foreach ($gallery_images as $image): ?>

        <a class="fancybox" rel="group" title="<?=(isset($image['title'])) ? $image['title'] : ''?>" href="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $gallery_url . '/' . $image['img']?>">
            <img src="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $gallery_url . '/small_' . $image['img']?>" width="150" height="150">
        </a>

        <?php endforeach; ?>

    </div>
