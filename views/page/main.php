<?php
/* @var $this yii\web\View */
use app\assets\OwlGalleryAsset;
use app\assets\FancyAsset;
OwlGalleryAsset::register($this);
FancyAsset::register($this);

$this->title = 'Головна FTS';
//$this->disablePageContainer = 1;
$this->params[ 'disablePageContainer' ] = true;
?>
<div class="fts-slider-body">
  <div class="fts-slider-new owl-carousel owl-theme fts-slider">
        <?php foreach ($slides['slider'] as $slide): ?>
          <img class="owl-lazy" data-src="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $slide['url'] . '/' . $slide['img'] ?>" alt="<?=$slide['title'] ?>" title="<?=$slide['title'] ?>">
         <?php endforeach; ?>
  </div>
</div>

<div class="fts-afterslider-advert">
  <img src="images/slogan.png" alt="">
</div>
<div class="fts-slider-separator"></div>

<div class="fts-product-catalog-container">

</div>

<div class="fts-gallery-title">
  <div class="container">
    <p></p>
  </div>
</div>
<div class="fts-products-contailer">
  <div class="container">
    <ul class="fts-products-list">
      <li><a href="/product/product-card-akryl">Декоративна штукатурка<br>STRUCTURE LINE</a></li>
      <li><a href="/product/product-card-marmure">Мозаїчна штукатурка <br>STONE LINE</a></li>
      <li><a href="/product/product-card-quartzline-acryl">Грунт кварцевий<br>QUARTZ LINE</a></li>
      <li><a href="/product/product-card-facade-acryl">Фарба фасадна<br>COLOR LINE</a></li>
    </ul>
  </div>
</div>
<div class="fts-gallery-content">
  <div class="container">
      <ul class="fts-gallery-content-list owl-carousel">
        <!--<li><a href="/page/gallery"><img class="owl-lazy" data-src="/uploads/gallery/portfolio/6.jpg" alt=""></a></li>-->
        <!--<li><a href="/page/gallery"><img class="owl-lazy" data-src="/uploads/gallery/portfolio/53.jpg" alt=""></a></li>-->
        <!--<li><a href="/page/gallery"><img class="owl-lazy" data-src="/uploads/gallery/portfolio/5.jpg" alt=""></a></li>-->
        <!--<li><a href="/page/gallery"><img class="owl-lazy" data-src="/uploads/gallery/portfolio/6.jpg" alt=""></a></li>-->
        <!--<li><a href="/page/gallery"><img class="owl-lazy" data-src="/uploads/gallery/portfolio/53.jpg" alt=""></a></li>-->
        <!--<li><a href="/page/gallery"><img class="owl-lazy" data-src="/uploads/gallery/portfolio/5.jpg" alt=""></a></li>-->
	      <?php foreach ($slides['carousel'] as $slide): ?>
          <li><a class="fancybox" rel="group"  href="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $slide['url'] . '/' . $slide['img'] ?>">
              <img class="owl-lazy height-fixed" data-src="<?=Yii::$app->request->hostInfo . '/uploads/gallery/' . $slide['url'] . '/' . $slide['img'] ?>" alt="<?=$slide['title'] ?>" title="<?=$slide['title'] ?>">
            </a>
          </li>
	      <?php endforeach; ?>



      </ul>
  </div>
</div>

<div class="fts-recomendation-title">
  <div class="container">
    <p>ми рекомендуємо</p>
  </div>
</div>
<div class="recomendation-list">
  <div class="container">
    <ul>
	    <?php foreach ($products as $product): ?>
        <li>
          <a href="/product/<?=$product['url']?>">
            <img src="<?=Yii::$app->request->hostInfo . '/uploads/product_info_images/x300_' . $product['product_image'] ?>" alt="<?=$product['category_name'] ?>">
              <span><?=$product['category_name'] ?></span>
           </a>
            <span class="fts-recomendation-price"></span>
        </li>
	    <?php endforeach; ?>
      <!---->
      <!---->
      <!---->
      <!--<li><a href="/page/cap"><img src="images/recommendation2.jpg" alt="">Фреза для-->
      <!--    пінополістиролу</a><span class="fts-recomendation-price"></span></li>-->
      <!--<li><a href="#"><img src="images/recommendation5.jpg" alt="">Дюбель для-->
      <!--    пінополістиролу</a><span class="fts-recomendation-price"></span></li>-->
      <!--<li><a href="/page/cap"><img src="images/recommendation4.jpg" alt="">Заглушки з-->
      <!--    пінополістиролу</a><span class="fts-recomendation-price"></span></li>-->
    </ul>
  </div>

</div>