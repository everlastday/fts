<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Update Gallery: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-area">
  <div class="background-square-grey">

    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,
    ]) ?>
  </div>
</div>
