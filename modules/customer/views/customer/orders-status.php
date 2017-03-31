<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\FancyAsset;
FancyAsset::register($this);

?>


<div class="content-area-full-width">
  <div class="order-category">
    Показати закази:
    <a href="<?=Url::to('orders-status') ?>" class="active">Активні</a>
    <a href="<?=Url::to('orders-complete') ?>">Виконані</a>
    <a href="<?=Url::to('orders-all') ?>">Всі</a>
    <a href="<?=Url::to('orders-canceled') ?>">Відмінені</a>
  </div>

	<?php if(!empty($orders)): ?>
		<?php foreach ($orders as $order ): ?>
        <div class="order-body">
          <div class="order-container">
            <div class="order-title">
              Замовлення №100<?=$order->id ?> від <?=Yii::$app->formatter->asDate($order->created_at . ' CEST', 'dd.MM.yyyy') ?>
            </div>
            <div class="order-time">
              <div class="time">Час замовлення: <?=Yii::$app->formatter->asTime($order->created_at . ' CEST', "HH:mm") ?></div>
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
                  <th>Опції</th>
                  <th>Обєм</th>
                  <th>Кількість</th>
                  <th>Ціна</th>
                </tr>

				  <?php foreach ($order->items as $item): ?>
                    <tr>
                      <td><?=$products[$item->product_id]["category"]["category_name"]; ?></td>
                      <td>
						  <?php
						  $options = '';
						  foreach ($item as $key => $option) {
							  if(is_numeric($key)) {
								  $options .= explode("|", $option)[1] . ' | ';
							  }
						  }
						  if(!empty($item->color)) {
							  $options .= $colors[$item->color]['title'] .
							              HTML::a(Html::img( '@web/uploads/gallery/' . $colors[$item->color]['galleries']['url'] . '/small_' . $colors[$item->color]['img'], ['alt' => $colors[$item->color]['title']]),
								              '@web/uploads/gallery/' . $colors[$item->color]['galleries']['url'] . '/' . $colors[$item->color]['img'],
								              [ 'class' => 'fancybox',
								                'rel' => "group",
								                'title' => (isset($colors[$item->color]['title'])) ? $colors[$item->color]['title'] : '']);
						  }

						  echo rtrim($options, ' | ');
						  ?>

                      </td>
                      <td><?=$item->measure ?></td>
                      <td><?=$item->quantity ?> шт</td>
                      <td><?=$item->price ?> грн</td>
                    </tr>
				  <?php endforeach; ?>

              </table>
            </div>
            <div class="order-sum">
              Сума до оплати: <span class="sum"><?=$order->total_price->goods_total ?> грн</span>
            </div>
          </div>
        </div>
		<?php endforeach; ?>
	<?php endif; ?>
  <div class="pagination-container">
	  <?php
	  echo \yii\widgets\LinkPager::widget([
		  'pagination' => $pages,
		  'maxButtonCount' => 5,
		  'lastPageLabel' => 'Остання',
		  'firstPageLabel' => 'Перша',
	  ]);
	  ?>
  </div>
</div>