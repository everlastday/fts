<?php
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
?>

<div class="content-area client">
	<div class="details-container">
		<div class="detail-title">
			<h3>ОСОБИСТА ІНФОРМАЦІЯ</h3>
		</div>
		<div class="detail-body client">
			<?php $form = ActiveForm::begin([
				'id' => 'user-login-form',
				'enableClientValidation' => true,
				'enableAjaxValidation' => true,]); ?>
				<div class="field">
					<?=$form->field($model, 'username')->textInput(['class' => 'large'])?>
				</div>

				<div class="field">
					<?=$form->field($model, 'name')->textInput(['class' => 'large'])?>
				</div>
				<div class="field">
					<?=$form->field($model, 'surname')->textInput(['class' => 'large'])?>
				</div>
				<div class="field">
					<?=$form->field($model, 'phone', ['enableAjaxValidation' => true])->label('Телефон *')->widget(PhoneInput::className(), [
					'jsOptions' => [
						'initialCountry' => ['ua'],
						'nationalMode' => false,
					]]); ?>
				</div>
				<div class="field">
					<?=$form->field($model, 'address')->textInput(['class' => 'large'])?>
				</div>
				<div class="field">
					<?=$form->field($model, 'email', ['enableAjaxValidation' => true])->textInput(['class' => 'large'])?>
				</div>
				<div class="field">
					<?=$form->field($model, 'new_password')->passwordInput(['class' => 'normal'])?>
				</div>
				<div class="field">
					<?=$form->field($model, 'password_repeat')->passwordInput()->label('Повторіть пароль')?>
				</div>

		</div>

	</div>
	<!--<div class="btn-save">-->
	<!--	<a data-brackets-id="2764" href="#" class="btn-details">Зберегти зміни</a>-->
	<!--</div>-->
	<div class="btn-save">
		<button type="submit" class="btn-details">Зберегти зміни</button>
	</div>
	<?php ActiveForm::end() ?>
</div> <!-- content area -->