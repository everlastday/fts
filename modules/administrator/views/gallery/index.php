<?php
use yii\helpers\Url;
use yii\bootstrap\Html;
use app\assets\FancyAsset;
FancyAsset::register($this);


$this->title = 'Фотографії галереї';
$this->params['breadcrumbs'] = [
    ['label' => 'Фотографії галереї'],
]
?>
<div class="content-area-full-width grey">
    <ul class="photo-gallery">

        <?php  foreach ($gallery_images as $image): ?>
            <li>
                <div>
	                <a class="fancybox" rel="group"
	                   title="<?=(isset($image['title'])) ? $image['title'] : ''?>"
	                   href="<?=Url::to('/uploads/gallerys/' . $image['img']) ?>">
		                <?= Html::img('@web/uploads/gallerys/small_' . $image['img']) ?>
		                <!--<img src="--><?//=Yii::$app->request->hostInfo . '/uploads/gallerys/small_' . $image['img']?><!--">-->
	                </a>
                </div>
                <div class="img-action"><a data-id="<?=$image['id']?>" href="<?=Url::toRoute(Yii::$app->controller->id . '/delete')?>">Видалити</a></div>
            </li>

        <?php endforeach; ?>

        <li>
            <div>
	            <a class="gallery-photo-add" href="<?=Url::toRoute(Yii::$app->controller->id . '/create')?>">
		            <?= Html::img('@web/images/admin/img-gallery-add.png') ?>
	            </a>
            </div>
            <div class="img-action add"><a href="<?=Url::toRoute(Yii::$app->controller->id . '/create')?>">Додати фотографії</a></div>
        </li>
    </ul>

</div>
