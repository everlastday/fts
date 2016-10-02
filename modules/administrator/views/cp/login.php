<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = 'Login';

?>

<div class="admin-panel-page login">
	<div class="container">
		<div class="admin-login-form-container">
			<div class="form-header">
				<div class="admin-login-icon">
					<img src="<?=Yii::$app->request->getBaseUrl() ?>/images/admin/admin-login-user-icon.png">
				</div>
				Адміністратор
			</div>

			<div class="form-body">

				<div class="registration-data">
					Введіть Ваші реєстраційні данні
				</div>
				<?php $form = ActiveForm::begin(['id' => 'admin-login-form']); ?>
				<div class="form-group">
					<!--<input type="text" placeholder="">-->
					<?=$form->field($model, 'username')->textInput(['autofocus'   => true,
					                                                'placeholder' => '* Логін'
					])->label(false)?>

				</div>
				<div class="form-group" style="position:relative">
					<!--<input type="password" placeholder="* Пароль">-->
					<?=$form->field($model, 'password')->passwordInput(['placeholder' => '* Пароль'])->label(false)?>

					<!--<button type="submit" class="admin-login-submit">Увійти</button>-->
					<?= Html::submitButton('Увійти', ['class' => 'admin-login-submit', 'name' => 'login-button']) ?>


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

	</div>
</div>