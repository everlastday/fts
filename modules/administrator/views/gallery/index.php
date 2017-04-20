<?php
use yii\helpers\Url;
use yii\bootstrap\Html;
use app\assets\FancyAsset;
FancyAsset::register($this);

//var_dump($gallery); die();
$this->title = 'Фотографії галереї';
$this->params['breadcrumbs'] = [
    ['label' => 'Галереї', 'url' => '../../galleries/index'],
    ['label' => $gallery['gallery_name']],
];
$this->params['gallery_url'] = Yii::$app->controller->id . '/' . Yii::$app->controller->actionParams['gallery_url'] ;
//var_dump($gallery_images); die();
?>
<div class="content-area-full-width grey">
    <ul class="photo-gallery">
      <?php// var_dump($gallery_images); die(); ?>
        <?php  foreach ($gallery_images as $image): ?>
            <li>
                <div>
	                <a class="fancybox" rel="group"
	                   title="<?=(isset($image['title'])) ? $image['title'] : ''?>"
	                   href="<?=Url::to('/uploads/' . $this->params['gallery_url'] . '/' . $image['img']) ?>">
		                <?= Html::img('@web/uploads/' .  $this->params['gallery_url'] . '/small_' . $image['img']) ?>
                    <?php if($gallery['gallery_type'] == 2) : ?>
                    <span><?=(isset($image['title'])) ? $image['title'] : ''?></span>
                    <?php endif; ?>
	                </a>
                </div>

                <div class="img-action">
                  <input class="action_box" value="<?=$image['id']?>" type="checkbox">
                  <a href="<?=Url::toRoute([$this->params['gallery_url'] . '/update', 'id' => $image['id']], [])?>">Змінити</a> |
                  <a data-id="<?=$image['id']?>" href="<?=Url::toRoute($this->params['gallery_url'] . '/delete')?>">Видалити</a>
                </div>
            </li>

        <?php endforeach; ?>

        <li>
            <div>
	            <a class="gallery-photo-add" href="<?=Url::toRoute($this->params['gallery_url']. '/create')?>">
		            <?= Html::img('@web/images/admin/img-gallery-add.png') ?>
	            </a>
            </div>
            <div class="img-action add"><a href="<?=Url::toRoute($this->params['gallery_url'] . '/create')?>">Додати фотографії</a></div>
        </li>
    </ul>

</div>
