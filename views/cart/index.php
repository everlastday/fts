<?php
use yii\bootstrap\Html;

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

                //var_dump($item_id); die();
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
        <div class="cart-buttons">
          <a href="#" class="continue-shopping">Продовжити покупки</a>
          <a href="#" class="pay-order">Оплатити замовлення</a>
        </div>
    </div>

  </div>



  <div class="empty-cart <?=(count($items) > 0) ? 'hidden' : '' ?>">
    <p>Нажаль, зараз Ваш кошик порожній.</p>
  </div>



