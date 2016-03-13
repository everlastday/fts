<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductInfo */



$this->title = 'Внести зміни в товар - ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Менеджер товарів', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content-area">
    <div class="background-square-grey">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>
