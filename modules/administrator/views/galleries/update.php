<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */

$this->title = 'Update Galleries: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-area">
	<div class="background-square-grey">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>
