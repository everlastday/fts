<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributes */

$this->title = Yii::t('app', 'Обновити {modelClass}: ', [
    'modelClass' => 'Атрибути',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Атрибути'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновити');

//$this->title = 'Добавити атрибут';
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Атрибути'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content-area">
  <div class="background-square-grey">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
</div>
