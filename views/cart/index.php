<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use yii\captcha\Captcha;

$this->title = 'Кошик';
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class="cart <?=(count($items) > 0) ? '' : 'hidden' ?>">
    <div class="titles">
      <div class="product">Товар</div>
      <div class="price">Ціна товару</div>
      <div class="quantity">Кількість</div>
      <div class="total">Усього</div>
    </div>

    <?php if(!empty($items)): ?>

    <?php foreach ($items as $item_id => $item) : ?>
      <div class="cart-item" data-item-id="<?=$item_id?>">
        <div class="product">
          <div class="image">
              <?php
                $image     = 'x150_' . $products[ $item[ 'product_id' ] ][ 'product_image' ];
                $png_image = substr( $image, 0, strrpos( $image, '.', - 1 ) ) . '.png';
              ?>

            <?=file_exists($path_to_product_images . $png_image)
                    ? Html::img( '@web/uploads/product_info_images/' . $png_image )
                    : Html::img( '@web/uploads/product_info_images/' . $image );
            ?>
          </div>
          <div class="description">
            <strong>Назва товару:</strong><br>
            <?=$products[$item['product_id']]['name'] ?><br>
            <strong>Вага:</strong> <?=$item['measure'] ?><br>
            <?php foreach ($item as $k => $v) : ?>
                <?php if(is_numeric($k)):
                      $filter = explode('|', $v);
                ?>
                 <strong><?=$filter[0] ?>:</strong> <?=$filter[1] ?><br>

                <?php endif; ?>
            <?php endforeach; ?>

            <?php if($item['color']) : ?>
            <strong>Колір:</strong> <?=$colors[$item['color']]['title'] ?>
            <div class="product-color">
	            <?=Html::img( '@web/uploads/gallery/' . $colors[$item['color']]['galleries']['url'] . '/small_' . $colors[$item['color']]['img'] )?>
            </div>
            <?php endif; ?>
            <div class="cart-product-actions">
              <!--<a href="#">Редагувати</a> |-->
              <a class="cart_delete_item" href="/cart/del/<?=$item_id ?>" data-item="<?=$item_id ?>">Видалити</a>
            </div>
          </div>

        </div>
        <div class="price">
          <span><?=$item['price']; ?></span> грн
        </div>
        <div class="quantity">
          <div class="cart-counter">
            <input type="text" name="count" value="<?=$item['quantity']; ?>" maxlength="2">
            <div class="counter-buttons">
              <button class="qty plus">+</button>
              <button class="qty minus">&ndash;</button>
            </div>
          </div>
        </div>
        <div class="total">
          <span><?=($item['price'] * $item['quantity'])?></span> грн
        </div>
      </div>



    <?php endforeach; ?>

    <?php endif; ?>
    <div class="cart-sum">



        <div class="sum-column">
          <p class="goods_total">Вартість товару: <span><?=$cart_total['goods_total'] ?> грн</span></p>
          <p class="delivery_total">Вартість доставки: <span><?=$cart_total['delivery_total'] ?> грн</span></p>

          <div class="total-sum">
            Всього: <span><?=$cart_total['total'] ?> грн</span>
          </div>

        </div>
        <div class="login-form-container cart-form">
        <div class="form-body">


		    <?php $register_form = ActiveForm::begin([
			    'action' => \yii\helpers\Url::toRoute('cart/confirm'),
			    'id' => 'user-register-form',
			    'enableClientValidation' => true,
			    'enableAjaxValidation' => false,
			    'method' => 'POST']); ?>

		    <?=$register_form->field($users, 'fio', ['enableAjaxValidation' => true])->label('ПІБ *')?>
		    <?=$register_form->field($users, 'phone', ['enableAjaxValidation' => true])->label('Телефон *')->widget(PhoneInput::className(), [
			    'jsOptions' => [
				    //'onlyCountries' => ['ua'],
				    'initialCountry' => ['ua'],
				    //'setNumber' => ['1234345'],
				    'nationalMode' => false,
			    ]]); ?>
		    <?=$register_form->field( $users, 'delivery' )->dropDownList( [ 'Нова пошта' => 'Нова пошта', 'Укрпошта' => 'Укрпошта', 'Самовивіз' => 'Самовивіз' ], [ 'prompt' => 'Вибрати...' ] )->label( 'Доставка' ) ?>
		    <?=$register_form->field( $users, 'payment_method' )->dropDownList( [ 'Наложений платіж' => 'Наложений платіж', 'Безготівковий рахунок' => 'Безготівковий рахунок' ], [ 'prompt' => 'Вибрати...' ] )->label( 'Оплата' ) ?>
		    <?=$register_form->field( $users, 'comment' )->textarea(['rows' => 3])->label( 'Коментар' ) ?>
          <div class="submit-container">
		      <?php //= Html::submitButton('Зареєструватись', ['class' => 'user-login-submit', 'name' => 'login-button']) ?>
          </div>
          <div class="cart-buttons">
            <!--<a href="#" class="continue-shopping">Продовжити покупки</a>-->
            <button type="submit" class="pay-order">Оплатити замовлення</button>
          </div>
		    <?php ActiveForm::end() ?>
        </div>
      </div>

    </div>

  </div>



  <div class="empty-cart <?=(count($items) > 0) ? 'hidden' : '' ?>">
    <p>Нажаль, зараз Ваш кошик порожній.</p>
  </div>



