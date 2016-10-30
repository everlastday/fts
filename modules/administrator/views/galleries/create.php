<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Galleries */

$this->title = 'Додати галерею';
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-area">
	<div class="background-square-grey">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>
