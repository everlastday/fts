<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = 'Авторизація для клієна';

?>

<div class="page-container login">
	<div class="container">
		<div class="login-form-container">
			<div class="form-header">
				<div class="login-icon">
					<?= Html::img('@web/images/login-form-icon.png', ['alt'=>'some', 'class'=>'thing']);?>
					<!--<img src="--><?//=Yii::$app->request->getBaseUrl() ?><!--/images/admin-login-user-icon.png">-->
				</div>
				Постійний покупець
			</div>

			<div class="form-body">

				<div class="registration-data">
					Введіть Ваші реєстраційні данні
				</div>
				<?php $form = ActiveForm::begin(['id' => 'user-login-form']); ?>
				<div class="form-group">
					<!--<input type="text" placeholder="">-->
					<?=$form->field($model, 'username')->textInput(['autofocus'   => true,
					                                                'placeholder' => '* Email адреса або логін'
					])->label(false)?>

				</div>
				<div class="form-group" style="position:relative">
					<!--<input type="password" placeholder="* Пароль">-->
					<?=$form->field($model, 'password')->passwordInput(['placeholder' => '* Пароль'])->label(false)?>

					<!--<button type="submit" class="admin-login-submit">Увійти</button>-->
					<?= Html::submitButton('Увійти', ['class' => 'user-login-submit', 'name' => 'login-button']) ?>


				</div>
				<div class="form-remember-group">
					<!--<input type="checkbox" name="admin-login-remember" id="admin-login-remember">-->
					<?=$form->field($model, 'rememberMe')->checkbox()->label('Запам’ятати')?>
					<!--<label for="admin-login-remember"></label>-->
					<a href="#">Забули пароль?</a>
				</div>

				<?php ActiveForm::end() ?>
			</div>
		</div>
		<div class="login-form-container right">
			<div class="form-header">
				<div class="login-icon">
					<?= Html::img('@web/images/register-form-icon.png', ['alt'=>'some', 'class'=>'thing']);?>
				</div>
				Реєстрація
			</div>

			<div class="form-body">

				<div class="registration-data">
					Заповни анкету і отримай привілеї
				</div>
				<?php $register_form = ActiveForm::begin(['id' => 'user-register-form']); ?>

				<?=$register_form->field($model, 'username')->label('Прізвище')?>
				<?=$register_form->field($model, 'username')->label('Ім’я')?>
				<?=$register_form->field($model, 'username')->label('По батькові')?>
				<?=$register_form->field($model, 'username')->label('Телефон')?>
				<?=$register_form->field($model, 'username')->label('Адреса')?>

				<div class="email-pass-separator">
					<?=$register_form->field($model, 'username')->label('Email')?>
					<?=$register_form->field($model, 'username')->label('Пароль')?>
					<?=$register_form->field($model, 'username')->label('Повторіть')?>
				</div>
				<div class="captcha-separator">
					<span>Введіть число з картинки</span>
					<?=$register_form->field($model, 'username')->label('55102')?>
				</div>
				<div class="submit-container">
					<?= Html::submitButton('Зареєструватись', ['class' => 'user-login-submit', 'name' => 'login-button']) ?>
				</div>

				<?php ActiveForm::end() ?>
			</div>
		</div>
	</div>
</div>