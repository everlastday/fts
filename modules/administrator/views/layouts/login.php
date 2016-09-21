<?php

use backend\assets\FtsAsset;
use yii\helpers\Html;

FtsAsset::register($this);

$this->beginPage() ?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?=Html::csrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="wrapper">
    <div class="header">
        <div class="container">
            <a class="header-logo" href="#"><img src="<?=Yii::$app->request->getBaseUrl() ?>/images/logo_small_header.png" /></a>

        </div>
    </div>
    <div class="admin-login-panel-header">
        <div class="container">
            <h2>Аміністраційний відділ / Авторизація</h2>
        </div>
    </div>

 <?=$content ?>

</div><!-- wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
