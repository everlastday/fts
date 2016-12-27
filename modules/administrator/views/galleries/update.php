<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */

$this->title = 'Змінити галерею: ' . $model->gallery_name;
$this->params['breadcrumbs'][] = ['label' => 'Галереї', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->gallery_name;
//print_r($model->gallery_name); die();
?>
<div class="content-area">
	<div class="background-square-grey">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>
