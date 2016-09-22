<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ProductCategories;
use app\assets\EditorAsset;
EditorAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\ProductInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-info-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'ftsform','enctype' => 'multipart/form-data']]); ?>

    <?=Html::activeDropDownList($model, 'category_id', ArrayHelper::map(ProductCategories::find()->all(), 'id', 'category_name')) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'class' => 'xlarge'])->label('Ссилка') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'xlarge'])->label('Назва')?>

    <?= $form->field($model, 'colors_url')->textInput(['maxlength' => true, 'class' => 'xlarge'])->label('Ссилка на взірці кольорів') ?>

    <?//= $form->field($model, 'image')->textInput(['maxlength' => true, 'class' => 'xlarge'])?>

    <?= $form->field($model, 'file')->fileInput()->label('Зображення')  ?>

    <?= $form->field($model, 'params')->textarea(['rows' => 6, 'class' => 'xlarge'])->label('Характеристики') ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6, 'class' => 'xlarge'])->label('Текст') ?>

    <?//= $form->field($model, 'category_id')->textInput() ?>

        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Обновити', [ 'class' => 'btn-color-options' ]) ?>

    <?php ActiveForm::end(); ?>

</div>