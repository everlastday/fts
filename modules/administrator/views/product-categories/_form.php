<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => [
    'class' => 'ftsform'
]]); ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true, 'class' => 'xlarge'])->label('Назва категорії') ?>


    <?= $form->field($model, 'status')->hiddenInput(['value' => '1'])->label(false) ?>




<?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Обновити', ['class' => 'btn-color-options']) ?>
<?php ActiveForm::end(); ?>




