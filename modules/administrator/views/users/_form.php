<?php

use yii\widgets\ActiveForm;

?>


<?php $form = ActiveForm::begin(['options' => ['class' => 'ftsuser']]); ?>
<div class="field">



    <?php if(!$user->isNewRecord): ?>
    <?= $form->field($user, 'id')->textInput(['class' => 'small', 'readonly' => true])->label('№'); ?>
    <?php endif; ?>
</div>
<div class="field">
    <?= $form->field($user, 'username')->textInput(['class' => 'large'])->label('Ім\'я:'); ?>
</div>
<div class="field">
    <?= $form->field($user, 'address')->textInput(['class' => 'large'])->label('Адреса:'); ?>

</div>
<div class="field">

    <?= (!$user->isNewRecord) ?
        $form->field($user, 'new_password')->passwordInput(['class' => 'large'])->label('Новий пароль:') :
        $form->field($user, 'password')->passwordInput(['class' => 'large'])->label('Пароль:');
    ?>

</div>
<div class="field">
    <?= $form->field($user, 'email')->textInput(['class' => 'normal'])->label('E-mail:'); ?>
</div>


<?php if(!$user->isNewRecord): ?>

<div class="field">
    <?= $form->field($user, 'created_at')->textInput(['class' => 'normal', 'value' => date('d.m.Y',$user->created_at), 'readonly' => true])->label('Дата регістрації:'); ?>
</div>
<div class="field">
    <?= $form->field($user, 'updated_at')->textInput(['class' => 'normal', 'value' => date('d.m.Y H:i:s',$user->updated_at), 'readonly' => true])->label('Останный візит:'); ?>
</div>
<div class="field">
    <?= $form->field($user, 'id')->textInput(['class' => 'small', 'readonly' => true])->label('ID:'); ?>
</div>
<div class="field">
    <label for="online">Онлайн:</label>
    <input class="small" type="text" name="online" value="Так" readonly>
</div>
<?php endif; ?>



<div class="field">


    <?= $form->field($user, 'status')
                 ->dropDownList(
                     [
                         0 => 'Користувач',
                         10 => 'Адміністратор',
                     ]
                 )->label('Група:'); ?>





</div>