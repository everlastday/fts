<?php


use yii\widgets\ActiveForm;

$this->title = 'Додати користувача';
$this->params['breadcrumbs'] = [
        ['label' => 'Адміністратори'],
]
?>




<div class="content-area">
    <div class="details-container">
        <div class="detail-title">
            <h3>Детальні данні користувача</h3>
        </div>
        <div class="detail-body">

            <?= $this->render('_form', [
                'user' => $user,
            ]) ?>
        </div>
    </div>



    <?php if(!$user->isNewRecord): ?>
        <div class="details-container">
            <div class="detail-title">
                <h3>Загальна iнформація про замовлення користувача</h3>
            </div>
            <div class="detail-body">
                <!--<form action="">-->
                <div class="field">
                    <label for="total_orders">Загальна кількість замовлень:</label>
                    <input class="small" type="text" name="total_orders" value="5"/>
                </div>
                <div class="field">
                    <label for="total_amount_of_orders">Загальна сума замовлень:</label>
                    <input class="medium" type="text" name="total_amount_of_orders" value="2652 грн" />
                </div>
                <div class="field">
                    <label for="num_active_orders">Кількість активних замовлень:</label>
                    <input class="small" type="text" name="num_active_orders" value="1"/>
                </div>
                <div class="field">
                    <label for="num_paid_orders">Кількість оплачених замовлень:</label>
                    <input class="small" type="text" name="num_paid_orders" value="4" />
                </div>
                <div class="field">
                    <label for="num_paid">Кількість неоплачених:</label>
                    <input class="small" type="text" name="num_paid" value="1"/>
                </div>
                <div class="field">
                    <label for="num_completed">Кількість викононих:</label>
                    <input class="small" type="text" name="num_completed" value="4"/>
                </div>
                <!--</form>-->
            </div>
        </div>
    <?php endif; ?>

    <div class="btn-save">
        <button type="submit" class="btn-details">Зберегти</button>
    </div>
    <?php ActiveForm::end(); ?>
</div> <!-- content area -->
