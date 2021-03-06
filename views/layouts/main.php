<?php
use yii\helpers\Html;
use app\assets\FtsAsset;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

FtsAsset::register($this);
//echo CustomMenu::widget(['message' => 'Good morning']);
?>


<?php $this->beginPage() ?>
<!doctype html>

<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?=Yii::$app->language?>"> <!--<![endif]-->
<head>
	<meta charset="<?=Yii::$app->charset?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?=Html::encode($this->title)?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?=Html::csrfMetaTags()?>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
	your browser</a> to improve your experience.</p>
<![endif]-->
<div id="wrapper">
	<!--<div class="top-menu">-->
	<!--    <div class="container">-->
	<!--        <div class="fts-search">-->
	<!--            <form class="navbar-form navbar-left" role="search">-->
	<!--                <div class="form-group">-->
	<!--                    <input type="text" class="form-control" placeholder="Пошук">-->
	<!--                </div>-->
	<!--                <button type="submit" class="btn btn-search">-->
	<!--                    <span class="fts-search-ico">&nbsp;</span>-->
	<!--                </button>-->
	<!--            </form>-->
	<!--        </div>-->
	<!--        <ul class="top-buttons">-->
	<!--            <li><a href="#">Вхід</a></li>-->
	<!--            <li><a class="cart-button" href="#"><span>28</span></a></li>-->
	<!--        </ul>-->
	<!--    </div>-->
	<!--</div>-->
	<!--<div class="toggle-top-button">-->
	<!--    <span class="down"></span>-->
	<!--</div>-->

	<header class="clearfix">
		<div class="container">
			<div class="fts-logo">
				<a href="<?=Yii::$app->request->hostInfo?>" class="fts-logo-img">
					<img src="/images/fts-logo.png" alt="" title="">
				</a>

			</div>
			<img class="slogan" src="/images/main-slogan.png" alt="">
		</div>


	</header>

	<nav class="fts-top-nav">
		<div class="container">
			<ul class="fts-products-menu">
				<li><a href="#">Штукатурка</a>
					<div class="fts-submenu-bg">
						<div class="fts-submenu-container">
							<ul>
								<li><a href="">STRUCTURE LINE</a></li>
								<li><a href="/product/product-card-akryl">Акрилова</a></li>
								<li><a href="/product/product-card-silicone">Силіконова</a></li>

							</ul>
							<ul>
								<li><a href="#">STONE LINE</a></li>
								<li><a href="/product/product-card-decor">Мозаїчна DECOR</a></li>
								<li><a href="/product/product-card-marmure">Мозаїчна MARMURE</a></li>

							</ul>
						</div>
					</div>

				</li>
				<li><a href="#">Грунт</a>

					<div class="fts-submenu-bg">
						<div class="fts-submenu-container">
							<ul>
								<li><a href="">QUARTZ LINE</a></li>
								<li><a href="/product/product-card-quartzline-acryl">Акриловий</a></li>
								<li><a href="/product/product-card-quartzline-silicone">Силіконовий</a></li>

							</ul>
							<ul>
								<li><a href="">Грунт</a></li>
								<li><a href="/product/product-card-grunt-glybokyi">Глибокого проникнення</a></li>
							</ul>
						</div>
					</div>

				</li>
				<li><a href="#">Фарба</a>
					<div class="fts-submenu-bg">
						<div class="fts-submenu-container">
							<ul>
								<li><a href="">FASADE LUXE</a></li>
								<li><a href="/product/product-card-facade-acryl">Акрилова</a></li>
								<li><a href="/product/product-card-facade-silicone">Силіконова</a></li>

							</ul>
							<ul>
								<li><a href="#">CLASSIC</a></li>
								<li><a href="/product/product-card-classic-acryl">Інтер'єрна фарба</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li><a href="/page/cap">Заглушка</a>

				</li>
				<li><a href="#">Клей</a>
					<div class="fts-submenu-bg">
						<div class="fts-submenu-container">
							<ul>
								<li><a href="">TERMO</a></li>
								<li><a href="/product/product-card-termo-1">TERMO 1</a></li>
								<li><a href="/product/product-card-termo-2">TERMO 2</a></li>
							</ul>
						   <ul>
								<li><a href="">CERAMIC</a></li>
								<li><a href="/product/ceramic_01">CERAMIC 01</a></li>
								<li><a href="/product/ceramic_11">CERAMIC 11</a></li>
								<li><a href="/product/ceramic_21">CERAMIC 21</a></li>
								<li><a href="/product/ceramic_31">CERAMIC 31</a></li>
							</ul>
							
							<ul>
								<li><a href="">BLOCK</a></li>
								<li><a href="/product/block_63">Block 63</a></li>
								
							</ul>

						</div>
					</div>
				</li>


			</ul>
			<ul class="fts-products-menu">
				<li><a href="/page/about">Про нас</a>
				<li><a href="/page/contacts">Контакти</a></li>

				<li><a href="#">Фотогалерея</a>
					<div class="fts-submenu-bg">
						<div class="fts-submenu-container">
							<ul>
								<li><a href="">Взірці кольорів </a></li>
								<li><a href="/gallery/decor">Взірці кольорів DECOR </a></li>
								<li><a href="/gallery/marmure">Взірці кольорів MARMURE </a></li>
								<li><a href="/gallery/akryll">Взірці кольорів STRUCTURE LINE</a></li>
							</ul>
							<ul>
								<li><a href="">Фотогалерея</a></li>
								<li><a href="/gallery/portfolio">Фотогалерея робіт</a></li>

							</ul>
						</div>
					</div>
				</li>

			</ul>

		</div>
	</nav>

  <?php if($this->params['disablePageContainer'] != true): ?>
	<div class="clearfix"></div>
  <div class="page-container">
    <div class="fts-breadcrums">
      <?=Breadcrumbs::widget([
	      'tag' => 'div',
	      'options' => ['class' => 'breadcrumbs'],
	      'itemTemplate' => " / {link}", // template for all links
	      'activeItemTemplate' => " / {link}", // template for all links
	      'homeLink' => [ 'class' => 'home', 'label' => 'Головна', 'url' => Url::to('/') , 'template' => '{link}'],
	      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [''],
      ]); ?>
      <!--<a class="home" href="#">На головну</a> / Вхід в магазин / Реєстрація-->
    </div>
  <?php endif ?>
	<?=$content ?>

	<?php if($this->params['disablePageContainer'] != true): ?>
  </div>
  <?php endif ?>
  <footer>
		<div class="fts-footer-contacts">
			<div class="container">
				<ul class="fts-contacts">
					<li class="contacts"><a href="/page/contacts">Контакти</a></li>
					<li class="email">e-mail: office@fts.ua - тел: (03433) 43 0 43</li>
					<!--<li class="feedback"><a href="#">Напиши нам</a></li>-->
				</ul>
				<!--<ul class="fts-social">-->
				<!--    <li><a class="google" href="#google">google</a></li>-->
				<!--    <li><a class="vk" href="#vk">vk</a></li>-->
				<!--    <li><a class="facebook" href="#fb">facebook</a></li>-->
				<!--</ul>-->
			</div>
		</div>
		<div class="footer-main"  style="display: none">
			<div class="container">
				<ul>
					<li><a href="/page/product-card-akryl">Штукатурка</a></li>
					<li><a href="/page/product-card-grunt-glybokyi">Грунт</a></li>
					<li><a href="/page/product-card-quartzline-acryl">Фарба</a></li>
					<li><a href="#">Матеріали</a></li>
				</ul>
				<!--<ul>-->
				<!--    <li><a href="#">Топ продаж</a></li>-->
				<!--    <li><a href="#">Акція</a></li>-->
				<!--    <li><a href="#">Весь товар</a></li>-->
				<!--</ul>-->
				<ul>
					<li><a href="/page/product-card-akryl">STRUCTURE LINE</a></li>
					<li><a href="/page/product-card-marmure">STONE LINE</a></li>
					<li><a href="/page/product-card-quartzline-acryl">QUARTZ LINE</a></li>
					<li><a href="/page/product-card-facade-acryl">COLOR LINE</a></li>
				</ul>
				<ul>
					<li><a href="">Пінопласт</a></li>
					<li><a href="">Мінвата</a></li>
					<li><a href="">Кріплення</a></li>
				</ul>
				<ul>
					<li><a href="/page/about">Про нас</a></li>
					<li><a href="">Оплата</a></li>
					<li><a href="">Доставка</a></li>
				</ul>

				<div class="fts-map">
					<p>Наше місцезнаходження</p>
					<a href="<?=Yii::$app->request->hostInfo?>/page/contacts"><img src="/images/map.jpg" alt=""></a>

				</div>
			</div>
		</div>
		<div class="fts-copyrights" style="display: none">
			<div class="container">
				<!--<ul class="fts-copyright-menu">-->
				<!--    <li><a class="lng" href="">Мова</a></li>-->
				<!--    <li><a href="">Конфенденційність</a></li>-->
				<!--    <li><a href="">Умови використання</a></li>-->
				<!--    <li><a href="">Карта сайту</a></li>-->
				<!--</ul>-->
				<p class="copyright">Copyright © <?= date('Y') ?>. All Rights Reserved.</p>
				<!--<div class="fts-footer-logo">-->
				<!--    <a href="#">-->
				<!--        <img src="/images/fts-logo-small.png" alt="">-->
				<!--    </a>-->
				<!--</div>-->
			</div>
		</div>

	</footer>
</div><!-- wrapper -->

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>