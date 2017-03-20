<?php
//
use yii\helpers\Html;

$this->title = 'Адмінка - Категорія товарів';
$this->params[ 'breadcrumbs' ] = [
	[ 'label' => 'Категорія товарів' ],
]
?>

<div class="content-area">

  <table class="basic product-category">
    <tr>
      <th><span>Вибір</span></th>
      <th><span>№</span></th>
      <th><span>Категорія товару</span></th>
      <th><span>Статус</span></th>
    </tr>
	  <?php foreach ( $data as $val ): ?>
        <tr>
          <td class="right-border"><input class="action_box" value="<?=$val[ 'id' ]?>" type="checkbox"></td>
          <td class="right-border"><?=$val[ 'id' ]?></td>
          <td class="right-border"><?=$val[ 'category_name' ]?></td>
          <td>
			  <?=( $val[ 'status' ] == 1 )
				  ? Html::img( '@web/images/admin/status-in-stock.png', [ 'class' => 'status' ] )
			    : Html::img( '@web/images/admin/status-out.png', [ 'class' => 'status' ] )
			  ?>
          </td>
        </tr>

	  <?php endforeach ?>
  </table>
</div>