<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Update Gallery: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $gallery->gallery_name, 'url' => 'index'];
$this->params['breadcrumbs'][] = 'Змінити параметри зображення';
?>
<div class="content-area">
  <div class="background-square-grey">

    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,
    ]) ?>
  </div>
</div>
