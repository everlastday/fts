<?php
use yii\helpers\Url;
?>
<div class="content-area-full-width">
	<div class="order-body">
		<div class="order-category">
			Показати закази:
			<a href="<?=Url::to('orders-status') ?>">Активні</a>
			<a href="<?=Url::to('orders-complete') ?>" class="active">Виконані</a>
			<a href="<?=Url::to('orders-all') ?>">Всі</a>
			<a href="<?=Url::to('orders-canceled') ?>">Відмінені</a>
		</div>
		<div class="order-container">
			<div class="order-title">
				Замовлення №1 від 01.03.2015
			</div>
			<div class="order-time">
				Час замовлення: 14:27
			</div>
			<div class="order-status-line">
				Оплачено: ні
				<div class="order-status completed">
					Виконано
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
						<td><div class="order-product-color" style="background-color: #371130;"></div></td>
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
						<td><div class="order-product-color" style="background-color: #558675;"></div></td>
						<td>20 шт</td>
						<td>20 000 грн</td>
					</tr>
					<tr>
						<td>Штукатурка мозаїчна</td>
						<td>MARMURE</td>
						<td>2,8 мм</td>
						<td>1,5 кг</td>
						<td><div class="order-product-color" style="background-color: #008675;"></div></td>
						<td>200 шт</td>
						<td>2 000 грн</td>
					</tr>
				</table>
			</div>
			<div class="order-sum">
				Сума до оплати: <span class="sum">610 грн</span>
			</div>

		</div>
	</div>

	<!--     order body 2          -->
	<div class="order-body">

		<div class="order-container">
			<div class="order-title">
				Замовлення №2 від 22.06.2015
			</div>
			<div class="order-time">
				Час замовлення: 13:22
			</div>
			<div class="order-status-line">
				Оплачено: так
				<div class="order-status completed">
					Виконано
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
						<td>Штукатурка мозаїчна</td>
						<td>MARMURE</td>
						<td>2,8 мм</td>
						<td>1,5 кг</td>
						<td><div class="order-product-color" style="background-color: #662222;"></div></td>
						<td>30 шт</td>
						<td>1 000 грн</td>
					</tr>
				</table>
			</div>
			<div class="order-sum">
				Сума до оплати: <span class="sum">333 грн</span>
			</div>

		</div>
	</div>

	<!--   end order body 2             -->
</div>