<?php

use yii\helpers\Html;

$this->title = 'Змінити інформацію на сторінці: ' . ' ' . $model->title;

//$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';

$this->params['breadcrumbs'][] = ['label' => 'Менеджер сторінок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content-area">
    <div class="background-square-grey">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

