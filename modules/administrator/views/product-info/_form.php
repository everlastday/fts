<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ProductCategories;
use app\assets\EditorAsset;

EditorAsset::register( $this );
/* @var $this yii\web\View */
/* @var $model app\models\ProductInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-info-form">

	<?php $form = ActiveForm::begin( [ 'options' => [ 'class' => 'ftsform', 'enctype' => 'multipart/form-data' ] ] ); ?>

	<?=$form->field( $model, 'category_id' )->dropDownList( ArrayHelper::map( ProductCategories::find()->all(), 'id',
		'category_name' ), [ 'prompt' => 'Вибрати...' ] )?>

	<?=$form->field( $model, 'url' )->textInput( [ 'maxlength' => true, 'class' => 'xlarge' ] )->label( 'Ссилка' )?>

	<?=$form->field( $model, 'name' )->textInput( [ 'maxlength' => true, 'class' => 'xlarge' ] )->label( 'Назва' )?>

	<?=$form->field( $model, 'gallery_id' )->dropDownList( ArrayHelper::map( \app\models\Galleries::find()->where(['gallery_type' => 2])->all(), 'id',
		'gallery_name' ), [ 'prompt' => 'Вибрати...' ] )->label( 'Галерея' )?>

	<?=$form->field( $model, 'file' )->fileInput()->label( 'Зображення' )?>

	<?=$form->field( $model, 'params' )->textarea( [ 'rows' => 6, 'class' => 'xlarge' ] )->label( 'Характеристики' )?>

	<?=$form->field( $model, 'info' )->textarea( [ 'rows' => 6, 'class' => 'xlarge' ] )->label( 'Текст' )?>
	<?=$form->field( $model, 'info' )->textarea( [ 'rows' => 6, 'class' => 'xlarge' ] )->label( 'Текст' )?>
	<?=$form->field( $model, 'measure' )->dropDownList( [ 'кг' => 'кг', 'л' => 'л' ], [ 'prompt' => 'Вибрати...' ] )->label( 'Маса' ) ?>

	<? //= $form->field($model, 'category_id')->textInput() ?>

	<?=Html::submitButton( $model->isNewRecord ? 'Додати' : 'Обновити', [ 'class' => 'btn-color-options' ] )?>

	<?php ActiveForm::end(); ?>

</div>
