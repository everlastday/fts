<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Додати зображення';


$this->params['breadcrumbs'][] = ['label' => $gallery->gallery_name, 'url' => 'index'];
$this->params['breadcrumbs'][] = 'Додати зображення';
?>
<div class="content-area">
    <div class="background-square-grey">


    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,
    ]) ?>

    </div>
</div>
