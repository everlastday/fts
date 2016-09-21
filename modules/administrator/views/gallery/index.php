<?php
use yii\helpers\Url;
use \backend\assets\FancyAsset;
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
                <div><a class="fancybox" rel="group" title="<?=(isset($image['title'])) ? $image['title'] : ''?>" href="<?=Yii::$app->request->hostInfo . '/uploads/gallerys/' . $image['img']?>"><img src="<?=Yii::$app->request->hostInfo . '/uploads/gallerys/small_' . $image['img']?>"></a></div>
                <div class="img-action"><a data-id="<?=$image['id']?>" href="<?=Url::toRoute(Yii::$app->controller->id . '/delete')?>">Видалити</a></div>
            </li>



        <?php endforeach; ?>

        <li>
            <div><a class="gallery-photo-add" href="<?=Url::toRoute(Yii::$app->controller->id . '/create')?>">
                    <img src="<?=Yii::$app->request->getBaseUrl()?>/images/img-gallery-add.png"></a></div>
            <div class="img-action add"><a href="<?=Url::toRoute(Yii::$app->controller->id . '/create')?>">Додати фотографії</a></div>
        </li>
    </ul>

</div>
