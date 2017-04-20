<?php
use yii\helpers\Url;
use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AdminAsset::register( $this );
?>

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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?=Html::csrfMetaTags()?>
		<title><?=Html::encode( $this->title )?></title>
		<?php $this->head() ?>

	</head>
	<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please
		<a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div id="wrapper">
		<div class="header">
			<div class="container">
				<a class="header-logo" href="<?=Yii::$app->request->hostInfo?>"><?php echo Html::img( '@web/images/logo_small_header.png' ) ?></a>
				<ul class="header-nav">
					<li>Ласкаво просимо, <?=Yii::$app->user->identity->username?></li>

					<li><a href="<?=str_replace( 'admin.', '', Yii::$app->request->hostInfo )?>">На сайт</a></li>
					<li><?=Html::beginForm( [ '/customer/logout' ],
							'post' ) . Html::submitButton( 'Вихід (' . Yii::$app->user->identity->username . ')' ) . Html::endForm()?>
					</li>
				</ul>
			</div>
		</div>
		<div class="admin-panel-header">
			<div class="container">
				<h1 class="admin-panel-title client">Мій кабінет</h1>
			</div>
		</div>

		<div class="admin-panel-nav">
			<div class="container">
				<div class="top-nav-wrapper">
					<ul class="top-nav-icons client">
						<li class="orders">
							<ul>
								<li>Кошик</li>
								<li>Замовлення</li>
								<li><a class="green" href="">Подивитись стан кошика</a></li>
							</ul>
						</li>
						<li class="users">
							<ul>
								<li>Особиста інформація</li>
								<li><a href="#">Змінити регістраційні дані</a></li>
								<li><a class="green" href="#">Подивитись мої особисті дані</a></li>
							</ul>
						</li>
						<li class="top-mail messages">
							<span class="num-messages">2</span>
							<ul>
								<li>Останні повідомлення</li>
								<li><a href="#" class="red">У Вас 2 непрочитане повідомлення</a></li>
								<li><a class="green" href="#">Подивитись всі повідомлення</a></li>
							</ul>
					</ul>
					<div class="top-nav-client-buttons">
						<ul>
							<li><a href="#"><?php echo Html::img( '@web/images/user-btn-news.png' ) ?></a></li>
							<li><a href="#"><?php echo Html::img( '@web/images/user-btn-promotions.png' ) ?></a></li>
						</ul>
					</div>
					<div class="top-nav-currency-client">
						<div>Курс валют:
							<a href="#" class="nav-currency-euro">euro</a> - 17грн;
							<a href="#" class="nav-currency-usd">usd</a> - 13грн
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="admin-panel-page">
			<div class="container">
				<div class="breadcrumbs">
					Головна / Мій кабінет / Особисті дані / інформація про замовлення
				</div>
				<div class="left-menu">
					<div class="menu-wrapper">

						<?php
						$menu = [
							'orders'  => [
								'title' => 'Замовлення',
								'items' => [
									'orders/active'       => 'Стан замовлень',
				          'orders/complete'     => 'Історія замовлень',
									'cart/' => 'Вміст кошика',

								]
							],
							'users'   => [
								'title' => 'Особисті дані',
								'items' => [
									'info/' => 'Особиста інформація',
									'index/'  => "Загальна інформація <br> про замовлення",
								]
							],
							'contact' => [
								'title' => 'Контакти',
								'items' => [
									'#admin/'   => 'Написати повідомлення адміну',
									'#contact-manager/' => 'Звязатись з менеджером',
									'#contacts/'  => 'Контактні дані фірми',
								]
							]
						];
						$current_action = Yii::$app->controller->action->id;
						foreach ( $menu as $container ) {
							echo '<div class="menu-container">' . '<h3>' . $container[ 'title' ] . '</h3>' . '<ul>';
							foreach ( $container[ 'items' ] as $link => $url_name ) {
								if ( $link == $current_action ) {
									$active = ' class="active"';
								} else {
									$active = '';
								}
								echo '<li' . $active . '><a href="' . Url::to(  [ $link]  ) . '">' . $url_name . '</a></li>';
							}
							echo '</ul></div>';
						}
						?>

						<!--<div class="menu-container">-->
						<!--	<h3>Замовлення</h3>-->
						<!--	<ul>-->
						<!--		<li><a href="index.html">Стан замовлень</a></li>-->
						<!--		<li><a href="product-category.html">Вміст кошика</a></li>-->
						<!--		<li><a href="product-category.html">Історія замовлень</a></li>-->
						<!--	</ul>-->
						<!--</div>-->
						<!--<div class="menu-container">-->
						<!--	<h3>Особисті дані</h3>-->
						<!--	<ul>-->
						<!--		<li><a href="#">Особиста інформація</a></li>-->
						<!--		<li class="active"><a href="users.html">Загальна інформація <br> про замовлення</a></li>-->
						<!--	</ul>-->
						<!--</div>-->
						<!--<div class="menu-container">-->
						<!--	<h3>Контакти</h3>-->
						<!--	<ul>-->
						<!--		<li><a href="orders-active.html">Написати повідомлення адміну</a></li>-->
						<!--		<li><a href="orders-complete.html">Звязатись з менеджером</a></li>-->
						<!--		<li><a href="orders-archive.html">Контактні дані фірми</a></li>-->
						<!--	</ul>-->
						<!--</div>-->

						<div class="menu-container">
							<h3>Прайс</h3>
						</div>

						<div class="download-price-list">
							<p><a href="#">Cкачати прайс-лист в Excel</a></p>
							<p><a href="#">Скачати прайс-лист в PDF</a></p>
						</div>
					</div>
				</div>


					<?=$content?>

			</div>
		</div>

	</div><!-- wrapper -->
	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>