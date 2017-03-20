<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-attributes-form">

    <?php $form = ActiveForm::begin(['options' => [
	    'class' => 'ftsform']]); ?>

    <?=$form->field($model, 'product_category_id')->dropDownList(
      ArrayHelper::map(\app\models\ProductCategories::find()->all(), 'id', 'category_name'),
      ['prompt'=>'Вибрати...']) ?>

    <?= $form->field($model, 'attribute')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'attribute_values[0]')->textInput(['maxlength' => true])->label('Значення 1') ?>
    <?= $form->field($model, 'attribute_values[1]')->textInput(['maxlength' => true])->label('Значення 2') ?>
    <?= $form->field($model, 'attribute_values[2]')->textInput(['maxlength' => true])->label('Значення 3') ?>
    <?= $form->field($model, 'attribute_values[3]')->textInput(['maxlength' => true])->label('Значення 4') ?>
    <?= $form->field($model, 'attribute_values[4]')->textInput(['maxlength' => true])->label('Значення 5') ?>
    <?= $form->field($model, 'attribute_values[5]')->textInput(['maxlength' => true])->label('Значення 6') ?>

	  <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Обновити', ['class' => 'btn-color-options']) ?>



    <?php ActiveForm::end(); ?>

</div>
