<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductCategories */

$this->title = 'Добавити категорію товарів';
$this->params['breadcrumbs'][] = ['label' => 'Категорія товарів', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-area">
    <div class="background-square-grey">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>