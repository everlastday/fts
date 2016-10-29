<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductGroups */

$this->title = 'Додати групу';
$this->params['breadcrumbs'][] = ['label' => 'Product Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-area">
	<div class="background-square-grey">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>