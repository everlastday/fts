<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$this->params['breadcrumbs'][] = 'Помилка';
$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($message) ?></h1>

    <!--<div class="alert alert-danger">-->
        <?php //= nl2br(Html::encode($message)) ?>
    <!--</div>-->

    <p>
      Сталася помилка під час обробки вашого запиту.
    </p>
    <p>
        Будь ласка, зв'яжіться з нами, якщо ви думаєте, що це помилка сервера. Дякую.
    </p>

</div>
