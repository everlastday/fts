<?php

use yii\helpers\Html;


$this->title = 'Добавити сторінку';
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