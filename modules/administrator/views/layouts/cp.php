<?php
use yii\helpers\Url;
use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
AdminAsset::register($this);
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?= Yii::$app->language ?>"> <!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
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
            <a class="header-logo" href="<?=Yii::$app->request->hostInfo?>"><img src="<?=Yii::$app->request->getBaseUrl() ?>/images/logo_small_header.png"/></a>
            <ul class="header-nav">
                <li>Ласкаво просимо, <?=Yii::$app->user->identity->username ?></li>


                <li><a href="<?=str_replace('admin.', '', Yii::$app->request->hostInfo) ?>">На сайт</a></li>
                <li><?=
                    Html::beginForm(['/cp/logout'], 'post')
                    . Html::submitButton(
                    'Вихід (' . Yii::$app->user->identity->username . ')')
                    . Html::endForm()
                    ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="admin-panel-header">
        <div class="container">
            <h1 class="admin-panel-title">панель адміністратора</h1>
        </div>
    </div>

    <div class="admin-panel-nav">
        <div class="container">
            <div class="top-nav-wrapper">
                <ul class="top-nav-icons">
                    <li class="orders">
                        <ul>
                            <li>Закази</li>
                            <li>На сьогодні нових заказів немає</li>
                            <li><a class="green" href="">Подивитись всі закази</a></li>
                        </ul>
                    </li>
                    <li class="users">
                        <ul>
                            <li>Останні реєстрації</li>
                            <li>Нових користувачів не має</li>
                            <li><a class="green" href="">Подивитись всіх користувачів</a></li>
                        </ul>
                    </li>
                    <li class="top-mail messages">
                        <span class="num-messages">22</span>
                        <ul>
                            <li>Останні повідомлення</li>
                            <li><a href="#" class="red">У Вас 1 непрочитане повідомлення</a></li>
                            <li><a class="green" href="">Подивитись всі повідомлення</a></li>
                        </ul>
                </ul>
                <div class="top-nav-currency">
                    <p>Курс валют:
                        <a href="#" class="nav-currency-euro">euro</a>
                        <a href="#" class="nav-currency-usd">usd</a>
                    </p>
                </div>
                <div class="top-nav-buttons">
                    <ul>
                        <li><a class="add" href="<?=Url::toRoute(Yii::$app->controller->id . '/create') ?>">Додати</a></li>
                        <li><a class="edit" data-update="" href="<?=Url::toRoute(Yii::$app->controller->id . '/update')?>">Змінити</a></li>
                        <li><a class="del" href="<?=Url::toRoute(Yii::$app->controller->id . '/delete')?>">Видалити</a></li>
                    </ul>
                </div>

            </div>


        </div>
    </div>


    <div class="admin-panel-page">
        <div class="container">
            <!--<div class="breadcrumbs">-->
                <!--Товари / Менеджер товарів --><?//= Yii::$app->controller->action->id; ?>
                <?php
                // $this is the view object currently being used
                echo Breadcrumbs::widget([
                    'tag' => 'div',
                    'options' => ['class' => 'breadcrumbs'],
                    'itemTemplate' => " / {link}", // template for all links
                    'activeItemTemplate' => " / {link}", // template for all links
                    'homeLink' => ['label' => 'Головна', 'url' => Yii::$app->getHomeUrl(), 'template' => '{link}'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);


                ?>
            <!--</div>-->


            <?php
             $menu = [
                 'products' => [
                     'title' => 'Товари',
                     'items' => [
                         'product-info/index' => 'Менеджер товарів',
                         'product-categories/index' => 'Категорія Товарів',
                         'page/index' => 'Менеджер сторінок',
                     ]
                 ],
                 'users' => [
                     'title' => 'Користувачі',
                     'items' => [
                         'users/admins' => 'Адміни',
                         'users/index' => 'Покупці',
                     ]
                 ],
                 'orders' => [
                     'title' => 'Замовлення',
                     'items' => [
                         'cp/orders-active' => 'Активні',
                         'cp/orders-complete' => 'Виконані',
                         'cp/orders-archive' => 'Архів замовлень',
                     ]
                 ],
                 'gallery' => [
                     'title' => 'Галерея',
                     'items' => [
                         'gallery' => 'Фотографії галереї',
                         'cp/photo-groups' => 'Фотографії по групам',
                     ]
                 ],
                 'colors' => [
                     'title' => 'Взірці кольорів',
                     'items' => [
                         '#1' => 'Акрилова штукатурка',
                         '#2' => 'Мозаїчна DECOR',
                         '#3' => 'Фарба',
                         'cp/color-options' => 'Опції',
                     ]
                 ]
             ];






            ?>


            <div class="left-menu">
                <div class="menu-wrapper">

                    <?php
                    $current_action = Yii::$app->controller->action->id;


                    foreach ($menu as $container) {
                        echo '<div class="menu-container">'
                             . '<h3>'. $container['title'] . '</h3>'
                             . '<ul>';
                        foreach($container['items'] as $link => $url_name) {

                            if($link == $current_action) {

                                $active = ' class="active"';
                            } else {
                                $active = '';
                            }


                            echo '<li' . $active . '><a href="' . Url::to([$link]) . '">' . $url_name .'</a></li>';
                        }
                        echo '</ul></div>';


                    }

                    ?>



                    <!--<div class="menu-container">-->
                    <!--    <h3>Товари</h3>-->
                    <!--    <ul>-->
                    <!--        <li class="active"><a href="/">Менеджер товарів</a></li>-->
                    <!--        <li><a href="/cp/product-category">Категорія Товарів</a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    <!--<div class="menu-container">-->
                    <!--    <h3>Користувачі</h3>-->
                    <!--    <ul>-->
                    <!--        <li><a href="/cp/admins">Адміни</a></li>-->
                    <!--        <li><a href="/cp/users">Покупці</a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    <!--<div class="menu-container">-->
                    <!--    <h3>Замовлення</h3>-->
                    <!--    <ul>-->
                    <!--        <li><a href="/cp/orders-active">Активні</a></li>-->
                    <!--        <li><a href="/cp/orders-complete">Виконані</a></li>-->
                    <!--        <li><a href="/cp/orders-archive">Архів замовлень</a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    <!--<div class="menu-container">-->
                    <!--    <h3>Галерея</h3>-->
                    <!--    <ul>-->
                    <!--        <li>-->
                    <!--            <a href="/cp/photo-gallery">Фотографії галереї</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="/cp/photo-groups">Фотографії по групам</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    <!--<div class="menu-container">-->
                    <!--    <h3>Прайс</h3>-->
                    <!--    <ul>-->
                    <!--        <li><a href="#">Завантажити прайс</a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    <!--<div class="menu-container">-->
                    <!--    <h3>Взірці кольорів</h3>-->
                    <!--    <ul>-->
                    <!--        <li><a href="#">Акрилова штукатурка</a></li>-->
                    <!--        <li><a href="#">Мозаїчна DECOR</a></li>-->
                    <!--        <li><a href="#">Фарба</a></li>-->
                    <!--        <li><a href="/cp/color-options">Опції</a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    <div class="import-export-bd">
                        <p><a href="#">Імпорт</a> /
                            <a href="#">Експорт бази данних</a></p>
                    </div>
                </div>
            </div>

        <!--  content  -->
            <?= $content ?>
        <!--  end content  -->

        </div>
    </div>

</div><!-- wrapper -->

<!--
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/jquery.glide.min.js"></script>
        <script src="js/main.js"></script>
-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
