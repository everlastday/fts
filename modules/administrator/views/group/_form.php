<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGroups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-groups-form">

    <?php $form = ActiveForm::begin(['options' => [
	    'class' => 'ftsform']]); ?>

    <?= $form->field($model, 'group')->dropDownList([
	    'prompt'=>'Вибрати...',
    	'1' => 'Група 1',
	    '2' => 'Група 2',
	    '3' => 'Група 3',
	    '4' => 'Група 4',
	    '5' => 'Група 5',

    ]); ?>

    <?=$form->field($model, 'product_category_id')->dropDownList(
	                            ArrayHelper::map(\app\models\ProductCategories::find()->all(), 'id', 'category_name'),
                                ['prompt'=>'Вибрати...']) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


        <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Обновити', ['class' => 'btn-color-options']) ?>


    <?php ActiveForm::end(); ?>

</div>
