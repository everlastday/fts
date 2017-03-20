<?php
$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $gallery['gallery_name'];
use app\assets\GalleryAsset;

GalleryAsset::register($this);
?>

<div class="galery gallery-color">
	<?php  foreach ($gallery_images as $image): ?>
		<a class="flipLightBox" title="<?=(isset($image['title'])) ? $image['title'] : ''?>" href="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $gallery_url . '/' . $image['img']?>">
			<img src="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $gallery_url . '/small_' . $image['img']?>" width="150" height="150">
			<span data-href=><?=$image['title'] ?></span>
		</a>
	<?php endforeach; ?>
</div>
