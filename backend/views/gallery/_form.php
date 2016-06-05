<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'ftsform','enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput()->label('Зображення')  ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'xlarge'])->label('Опис') ?>

    <?= $form->field($model, 'type')->hiddenInput(['value'=> 1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Обновити', [ 'class' => 'btn-color-options' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
