<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Адмінка - Менеджер атрибутів';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-area">

  <table class="basic">

    <tr>
      <th><span>Вибір</span></th>
      <th><span>Категорія</span></th>
      <th><span>Тип</span></th>
      <th><span>Значення</span></th>
    </tr>



	  <?php foreach($data as $val): ?>
        <tr>
          <td class="right-border"><input class="action_box" value="<?=$val['id']?>" type="checkbox"></td>

          <td class="right-border"><?=$val['productCategory']['category_name']?></td>
          <td class="right-border"><?=$val['attribute']?></td>
          <td class="right-border">
          <?
            if(!empty($val['attribute_values']) and is_array($val['attribute_values'])) {
              foreach ( $val[ 'attribute_values' ] as $attribute_value ) {
                if(!empty($attribute_value)) {
	                echo $attribute_value . "<br>";
                }
              }
            }
          ?>

          </td>
        </tr>
            <?//=(isset($val['product_image']) and !empty($val['product_image'])) ? Html::img($image_url . 'small_' . $val['product_image'], ['class' => 'small_product_image']) : ''?>
       <!--   <td class="right-border">-->
       <!--     <a target="_blank" class="product_link_to_site" href="--><?//= Url::to('/product/' . $val['url']) ?><!--">--><?//=$val['name']?><!--</a>-->
       <!--   </td>-->
       <!--   <td>-->
		<!--	  --><?//= Html::img('@web/images/admin/status-in-stock.png') ?>
	  <!---->
       <!--   </td>-->
       <!--   <td>-->
		<!--	  --><?//= Html::img('@web/images/admin/status-in-stock.png') ?>
       <!--   </td>-->
       <!--   <td>--><?//=$val['category']['category_name']?><!--</td>-->

	  <?php endforeach ?>

  </table>
</div>

