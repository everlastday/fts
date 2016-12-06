<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributes */

$this->title = Yii::t('app', 'Create Product Attributes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attributes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
