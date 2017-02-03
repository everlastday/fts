<?php
use yii\helpers\Html;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = ['label' => $data['name'], 'url' => '../'];
$this->params['breadcrumbs'][] = "Замовити";
//var_dump($data); die();
//$this->registerJs('$("document").ready(function(){ check_all_filters(); });');
?>

<div class="catalog">
  <div class="catalog-your-choice"><strong>Ваш вибір:</strong>
    <h2><?=$data[ 'category' ][ "category_name" ]?></h2>
  </div>
	<?php if ( ! empty( $data[ 'gallery_id' ] ) ) : ?>

      <div class="filter-color-container">
        <h3>Колір(№)</h3>
        <ul class="filter-colors">
			<?php
			foreach ( $colors as $color ): ?>
              <li class="tooltip" data-color="<?=$color->id?>">
                <span class="tooltiptext"><?=Html::img( '@web/uploads/gallery/' . $color->galleries->url . '/small_' . $color->img )?>
                  <br><?=$color->title?></span>
				  <?=Html::img( '@web/uploads/gallery/' . $color->galleries->url . '/small_' . $color->img )?>
              </li>

			<?php endforeach; ?>

        </ul>
        <div class="filter-result" data-title="color"></div>

      </div>
	<?php endif; ?>
  <div class="catalog-image <?=( empty( $data[ 'gallery_id' ] ) ) ? 'large' : ''?>">
    <!--<img src="/images/catalog-sample1.jpg" alt="">-->
	  <?=( isset( $data[ 'product_image' ] ) and ! empty( $data[ 'product_image' ] ) ) ? '<img src="/uploads/product_info_images/x300_' . $data[ 'product_image' ] . '" alt="" title="">' : '';?>

    <div class="selected-color"></div>
  </div>
  <div class="catalog-filter">

	  <?php
	  //var_dump($data); die();
	  if ( ! empty( $attributes ) ) {
		  foreach ( $attributes as $attribute ) :
			  ?>
            <div class="filter-container">
              <h3><?=$attribute->attribute?></h3>
              <ul>
				  <?php
				  // Видаляєм пусті елементи масиву
				  $attribute->attribute_values = array_filter( $attribute->attribute_values );
				  if ( count( $attribute->attribute_values ) == 1 ): ?>
                    <li class="active"><?=$attribute->attribute_values[ 0 ]?></li>
				  <?php else: ?>
					  <?php foreach ( $attribute->attribute_values as $avalue ): ?>
                      <li><?=$avalue?></li>
					  <?php endforeach; ?>
				  <?php endif; ?>
                <!--<li class="active">Баранек</li>-->
                <!--<li>Короїд</li>-->
              </ul>
              <div class="filter-result skip_filter" data-title="<?=$attribute->attribute?>"><?=( count( $attribute->attribute_values ) == 1 ) ? $attribute->attribute_values[ 0 ] : '';?></div>
            </div>
			  <?php
		  endforeach;
	  }
	  //var_dump($groups); die();
	  ?>


	  <?php if ( !empty( $groups ) == 1 ): ?>
    <div class="filter-container">
      <h3>Вага відра</h3>
      <ul>
		  <?php if ( count( $groups ) == 1 ): ?>
            <li class="active"><?=$groups[ 0 ][ 'type' ] . ' ' . $groups[ 0 ][ 'productInfo' ][ 'measure' ]?></li>
		  <?php else: ?>
			  <?php foreach ( $groups as $group ): ?>
              <li><?=$group[ 'type' ] . ' ' . $group[ 'productInfo' ][ 'measure' ]?></li>
			  <?php endforeach; ?>
		  <?php endif; ?>

      </ul>
      <div class="filter-result" data-title="measure"><?=( count( $groups ) == 1 ) ? $groups[ 0 ][ 'type' ] . ' ' . $groups[ 0 ][ 'productInfo' ][ 'measure' ] : '';?></div>

    </div>
    <?php endif; ?>

    <div class="filter-result" data-title="current_category_id"><?=$data[ 'category_id' ]?></div>
    <div class="filter-result" data-title="product_id"><?=$data[ 'id' ]?></div>
    <div class="filter-result" data-title="quantity">1</div>

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
      <p class="price">Ціна:
        <span>
          <span>0</span>
          грн.
        </span>
      </p>
      <button id="del_from_cart" class="btn-add-to-cart-red del">Видалити з кошика</button>
      <button id="add_to_cart" class="btn-add-to-cart-red" disabled>Додати до кошика</button>

      <a class="btn-one-click-buy" href="/cart">Перейти до кошика</a>
      <p class="cart-notice"></p>
      <p class="price-notice">Для остаточного визначення ціни виберіть будь - ласка
        колір, тип, розмір зерна та вагу відра</p>

    </div>

  </div>

</div>

