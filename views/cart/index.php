<?php
$this->title = 'Корзина';
?>

<div class="page-container">
  <div class="fts-breadcrums">
    <!--<a class="home" href="#">На головну</a> / Вхід в магазин / Реєстрація-->
  </div>
  <div class="cart">
    <div class="titles">
      <div class="product">Товар</div>
      <div class="price">Ціна товару</div>
      <div class="quantity">Кількість</div>
      <div class="total">Усього</div>
    </div>
    <div class="cart-item">
      <div class="product">
        <div class="image">
          <img src="/images/admin/sample/cart-product.png">
        </div>
        <div class="description">
          <strong>Назва товару:</strong><br>
          Штукатурка силіконова<br>
          <strong>Вага:</strong> 25 кг<br>
          <strong>Тип:</strong> Баранек<br>
          <strong>Розмір зерна:</strong> 1,5 мм<br>
          <strong>Колір:</strong> F 004
          <div style="background-color:#d8c25d;"
               class="product-color">
          </div>
          <div class="cart-product-actions">
            <a href="#">Редагувати</a> |
            <a href="#">Видалити</a>
          </div>
        </div>

      </div>
      <div class="price">
        350 грн
      </div>
      <div class="quantity">
        <div class="cart-counter">
          <input type="text" name="count" value="1">
          <div class="counter-buttons">
            <button>+</button>
            <button>&ndash;</button>
          </div>
        </div>
      </div>
      <div class="total">
        750 грн
      </div>
    </div>

    <div class="cart-item">
      <div class="product">
        <div class="image">
          <img src="/images/admin/sample/cart-product.png">
        </div>
        <div class="description">
          <strong>Назва товару:</strong><br>
          Штукатурка силіконова<br>
          <strong>Вага:</strong> 25 кг<br>
          <strong>Тип:</strong> Баранек<br>
          <strong>Розмір зерна:</strong> 1,5 мм<br>
          <strong>Колір:</strong> F 004
          <div style="background-color:#d8c25d;"
               class="product-color">
          </div>
          <div class="cart-product-actions">
            <a href="#">Редагувати</a> |
            <a href="#">Видалити</a>
          </div>
        </div>

      </div>
      <div class="price">
        350 грн
      </div>
      <div class="quantity">
        <div class="cart-counter">
          <input type="text" name="count" value="1">
          <div class="counter-buttons">
            <button>+</button>
            <button>&ndash;</button>
          </div>
        </div>
      </div>
      <div class="total">
        750 грн
      </div>
    </div>

    <div class="cart-sum">
        <div class="sum-column">
          <p>Вартість товару: <span>750 грн</span></p>
          <p>Вартість доставки: <span>30 грн</span></p>

          <div class="total-sum">
            Всього: <span>1880 грн</span>
          </div>

        </div>
        <div class="cart-buttons">
          <a href="#" class="continue-shopping">Продовжити покупки</a>
          <a href="#" class="pay-order">Оплатити замовлення</a>
        </div>
    </div>

  </div>
</div>
