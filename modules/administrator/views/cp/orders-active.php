<?php

$this->title = 'Активні замовлення';
$this->params['breadcrumbs'] = [
    ['label' => 'Активні замовлення'],
]

?>
<div class="content-area-full-width">
    <div class="order-body">
        <div class="order-category">
            <span>Активні замовлення</span>
        </div>
        <div class="order-container">
            <div class="order-title">
                Замовлення №4 від 15.08.2014
                <div>Вибрати щоб видалити
                    <input type="checkbox" value="1">
                </div>
            </div>
            <div class="order-time">
                Час замовлення: 14:27
            </div>
            <div class="order-status-line">
                Оплачено: ні
                <div class="order-status accepted">
                    Прийнято
                </div>
            </div>
            <div class="order-details">
                <h3>Склад замовлення:</h3>
                <table>
                    <tr>
                        <th>Найменування товару</th>
                        <th>Тип матеріалу</th>
                        <th>Розмір зерна</th>
                        <th>Вага</th>
                        <th>Колір</th>
                        <th>Кількість</th>
                        <th>Ціна</th>
                    </tr>
                    <tr>
                        <td>Штукатурка акрилова</td>
                        <td>Баранек</td>
                        <td>1,5 мм</td>
                        <td>25 кг</td>
                        <td><div class="order-product-color" style="background-color: #579830;"></div></td>
                        <td>5 шт</td>
                        <td>2 000 грн</td>
                    </tr>
                    <tr>
                        <td>Штукатурка мозаїчна</td>
                        <td>MARMURE</td>
                        <td>1,8 мм</td>
                        <td>7,5 кг</td>
                        <td><div class="order-product-color" style="background-color: #998675;"></div></td>
                        <td>100 шт</td>
                        <td>30 000 грн</td>
                    </tr>
                    <tr>
                        <td>Штукатурка мозаїчна</td>
                        <td>MARMURE</td>
                        <td>2,8 мм</td>
                        <td>1,5 кг</td>
                        <td><div class="order-product-color" style="background-color: #118675;"></div></td>
                        <td>20 шт</td>
                        <td>20 000 грн</td>
                    </tr>
                </table>
            </div>
            <div class="order-sum">
                Сума до оплати: <span class="sum">405 грн</span>
            </div>

        </div>
        <div class="submit-payment">
            Підтвердити оплату: <a href="#" class="btn-order-details">Оплачено</a>
        </div>
    </div>
    <!--                   order body 2-->
    <div class="order-body">
        <div class="order-category">
            <span>Активні замовлення</span>
        </div>
        <div class="order-container">
            <div class="order-title">
                Замовлення №6 від 14.08.2014
                <div>Вибрати щоб видалити
                    <input type="checkbox" value="1">
                </div>
            </div>
            <div class="order-time">
                Час замовлення: 14:29
            </div>
            <div class="order-status-line">
                Оплачено: так
                <div class="order-status paid">
                    Оплачено
                </div>
            </div>
            <div class="order-details">
                <h3>Склад замовлення:</h3>
                <table>
                    <tr>
                        <th>Найменування товару</th>
                        <th>Тип матеріалу</th>
                        <th>Розмір зерна</th>
                        <th>Вага</th>
                        <th>Колір</th>
                        <th>Кількість</th>
                        <th>Ціна</th>
                    </tr>
                    <tr>
                        <td>Штукатурка акрилова</td>
                        <td>Баранек</td>
                        <td>1,5 мм</td>
                        <td>25 кг</td>
                        <td><div class="order-product-color" style="background-color: #579830;"></div></td>
                        <td>5 шт</td>
                        <td>2 000 грн</td>
                    </tr>
                    <tr>
                        <td>Штукатурка мозаїчна</td>
                        <td>MARMURE</td>
                        <td>1,8 мм</td>
                        <td>7,5 кг</td>
                        <td><div class="order-product-color" style="background-color: #998675;"></div></td>
                        <td>100 шт</td>
                        <td>20 000 грн</td>
                    </tr>
                </table>
            </div>
            <div class="order-sum">
                <p>Сума до оплати: <span class="sum">425 грн</span></p>
            </div>

        </div>
        <div class="submit-payment">
            Завершити замовлення: <a href="#" class="btn-order-details">Завершити</a>
        </div>
    </div>

</div>