<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galleries-form">

    <?php $form = ActiveForm::begin(['options' => [
	    'class' => 'ftsform']]); ?>

    <?= $form->field($model, 'gallery_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'url')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'gallery_type')->dropDownList([
	    'prompt'=>'Вибрати...',
	    1 => 'Фотогалерея',
	    2 => 'Галерея кольорів',
      3 => 'Слайдер'
    ]); ?>

	<div class="multicheckbox">

    <?php
    if(!$model->isNewRecord) {
	    $checkedList = explode(",", $model->gallery_categories_array);
	    $model->gallery_categories = $checkedList;
    }
     ?>

	    <?= $form->field($model, 'gallery_categories')
		    ->checkboxlist(ArrayHelper::map(\app\models\ProductCategories::find()->all(), 'id', 'category_name')); ?>
	</div>
	<?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Обновити', ['class' => 'btn-color-options']) ?>

    <?php ActiveForm::end(); ?>

</div>
