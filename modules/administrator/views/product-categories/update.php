<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategories */

$this->title = 'Обновити назву категорії: ' . ' ' . $model->id;

//$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';

$this->params['breadcrumbs'][] = ['label' => 'Категорія товарів', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновити';

?>
<div class="content-area">
    <div class="background-square-grey">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>
