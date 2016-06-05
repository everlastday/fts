<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = 'Create Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Додати фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-area">
    <div class="background-square-grey">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>
