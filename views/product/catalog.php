<?php
use yii\helpers\Html;
$this->title = 'Каталог';

//var_dump($data); die();
?>

<div class="page-container catalog">
	<div class="catalog-your-choice"> <strong>Ваш вибір:</strong>
		<h2><?=$data['category']["category_name"] ?></h2>
	</div>
  <?php if(!empty($data['gallery_id'])) : ?>

	<div class="filter-color-container">
		<h3>Колір(№)</h3>
		<ul class="filter-colors">
		<?php
     $colors =  \app\models\Gallery::find()->joinWith('galleries')->where(['galleries_id' => $data['gallery_id']])->all();
     //var_dump( $colors ); die();

     foreach ($colors as $color):
         //var_dump($color->galleries->url); die();
         ?>


       <li class="tooltip">
           <span class="tooltiptext"><?= Html::img('@web/uploads/gallery/' .  $color->galleries->url . '/small_' . $color->img) ?> <br><?=$color->title?></span>
           <?= Html::img('@web/uploads/gallery/' .  $color->galleries->url . '/small_' . $color->img) ?>
       </li>

     <?php endforeach; ?>



			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
			<!--<li style="background:#c07f5a">#c07f5a</li>-->
			<!--<li style="background:#c3c3c3">#c3c3c3</li>-->
			<!--<li style="background:#828282">#828282</li>-->
			<!--<li style="background:#880015">#880015</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#fff200">#fff200</li>-->
			<!--<li style="background:#22b14c">#22b14c</li>-->
			<!--<li style="background:#00a2e8">#00a2e8</li>-->
			<!--<li style="background:#3f48cc">#3f48cc</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ffaec9">#ffaec9</li>-->
			<!--<li style="background:#ffc90e">#ffc90e</li>-->
			<!--<li style="background:#eee3b0">#eee3b0</li>-->
			<!--<li style="background:#b5e61d">#b5e61d</li>-->
			<!--<li style="background:#99d9ea">#99d9ea</li>-->
			<!--<li style="background:#7092be">#7092be</li>-->
			<!--<li style="background:#c8bfe7">#c8bfe7</li>-->
			<!--<li style="background:#a349a4">#a349a4</li>-->
			<!--<li style="background:#ed1c24">#ed1c24</li>-->
			<!--<li style="background:#ff7f27">#ff7f27</li>-->
			<!--<li style="background:#ba7a57">#ba7a57</li>-->
		</ul>
	</div>
  <?php endif; ?>
  <div class="catalog-image <?=(empty($data['gallery_id'])) ? 'large' : '' ?>">
		<!--<img src="/images/catalog-sample1.jpg" alt="">-->
		<?=(isset($data['product_image']) and !empty($data['product_image'])) ? '<img src="/uploads/product_info_images/' . $data['product_image'] . '" alt="" title="">' : ''; ?>


	</div>
	<div class="catalog-filter">

    <?php
    //var_dump($data); die();

    $attributes = \app\models\ProductAttributes::find()->where(['product_category_id' => $data['category_id']])->all();

    if(!empty($attributes)) {
      foreach ($attributes as $attribute) :
    ?>
      <div class="filter-container">
        <h3><?=$attribute->attribute ?></h3>
        <ul>
          <?php
          // Видаляєм пусті елементи масиву
          $attribute->attribute_values = array_filter($attribute->attribute_values);

          if(count($attribute->attribute_values) == 1): ?>
            <li class="active"><?=$attribute->attribute_values[0] ?></li>
          <?php else: ?>
            <?php foreach ($attribute->attribute_values as $avalue): ?>
              <li><?=$avalue?></li>
            <?php endforeach; ?>
          <?php endif; ?>
          <!--<li class="active">Баранек</li>-->
          <!--<li>Короїд</li>-->
        </ul>
      </div>
    <?php
      endforeach;
    }


    $groups = \app\models\ProductGroups::find()->where(['product_category_id' => $data['category_id']])->with('productInfo')->groupBy(['type'])->asArray()->all();

    //var_dump($groups); die();
    ?>

    <div class="filter-container">
    	<h3>Вага відра</h3>
    	<ul>
        <?php if(count($groups) == 1): ?>
        <li class="active"><?=$groups[0]['type'] . ' ' . $groups[0]['productInfo']['measure'] ?></li>
	      <?php else: ?>
            <?php foreach ($groups as  $group): ?>
        <li><?= $group['type'] . ' ' . $group['productInfo']['measure'] ?></li>
	      <?php endforeach; ?>
          <?php endif; ?>

    	</ul>
    </div>

		<!--<div class="filter-container">-->
		<!--	<h3>Тип</h3>-->
		<!--	<ul>-->
		<!--		<li class="active">Баранек</li>-->
		<!--		<li>Короїд</li>-->
		<!--	</ul>-->
		<!--</div>-->
		<!--<div class="filter-container">-->
		<!--	<h3>Розмір зерна</h3>-->
		<!--	<ul>-->
		<!--		<li>1,5 мм</li>-->
		<!--		<li>1,5 мм</li>-->
		<!--		<li>2,0 мм</li>-->
		<!--	</ul>-->
		<!--</div>-->
		<!--<div class="filter-container">-->
		<!--	<h3>Вага відра</h3>-->
		<!--	<ul>-->
		<!--		<li class="active">25 кг</li>-->
		<!--		<li>7,5</li>-->
		<!--	</ul>-->
		<!--</div>-->
	</div>
	<div class="clearfix"></div>
	<div class="price-container">
		<div>
			<p class="price">Ціна: <span>405 грн.</span></p>
			<a class="btn-add-to-cart-red" href="#">Додати до кошика</a> <a class="btn-one-click-buy" href="#">Купити в 1 клік</a>
			<p class="price-notice">Для остаточного визначення ціни виберіть будь - ласка
				колір, тип, розмір зерна та вагу відра</p>

		</div>

	</div>

</div>

