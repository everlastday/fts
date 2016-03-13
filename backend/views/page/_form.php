<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\assets\EditorAsset;
EditorAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'ftsform']]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->label('Ссилка') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Заголовок') ?>

    <?= $form->field($model, 'page')->textarea(['rows' => 6, 'class' => 'xlarge'])->label('Текст сторінки') ?>

    <?= $form->field($model, 'gallery')->checkbox(['label' => 'Підключити галерею?']) ?>

    <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Обновити', ['class' => 'btn-color-options']) ?>

    <?php ActiveForm::end(); ?>

</div>
