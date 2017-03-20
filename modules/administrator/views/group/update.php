<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGroups */

$this->title = 'Update Product Groups: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Група', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновити';
?>
<div class="content-area">
	<div class="background-square-grey">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>
