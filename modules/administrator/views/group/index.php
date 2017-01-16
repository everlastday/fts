<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Групи';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="content-area">
	<table class="basic product-category">
		<tr>
			<th><span>Вибір</span></th>
			<th><span>Група</span></th>
			<th><span>Категорія товару</span></th>
			<th><span>Маса/об'єм</span></th>
			<th><span>Ціна</span></th>
		</tr>
		<?php foreach($data as $val): ?>
			<tr>
				<td class="right-border"><input class="action_box" value="<?=$val['id']?>" type="checkbox"></td>
				<td class="right-border"><?=$val['group']?></td>
				<td class="right-border"><?=$val['productCategory']['category_name']?></td>
				<td class="right-border"><?=(float) $val['type']?></td>
				<td class="right-border"><?=$val['price']?></td>

			</tr>



		<?php endforeach ?>


	</table>
</div>
