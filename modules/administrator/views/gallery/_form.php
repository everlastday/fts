<?php


$groups_info = [
	'prompt'=>'Вибрати...',
	'1' => 'Група 1',
	'2' => 'Група 2',
	'3' => 'Група 3',
	'4' => 'Група 4',
	'5' => 'Група 5',
];


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'ftsform','enctype' => 'multipart/form-data']]); ?>


    <? if($model->isNewRecord)
          echo $form->field($model, 'file')->fileInput()->label('Зображення')
    ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'xlarge'])->label('Опис') ?>

    <?= $form->field($model, 'type')->hiddenInput(['value'=> 1])->label(false); ?>
    <?= $form->field($model, 'galleries_id')->hiddenInput(['value'=> $gallery->id])->label(false); ?>

    <? if(!empty($gallery->gallery_categories)):
      foreach ($gallery->gallery_categories as $gallery_category) : ?>
	    <?= $form->field($model, 'options['. $gallery_category['id'] .']')
            ->dropDownList($groups_info)
            ->label($gallery_category['category_name']); ?>

    <? endforeach;
        endif;
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Обновити', [ 'class' => 'btn-color-options' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
