<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Galleries;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галереї';
$this->params['breadcrumbs'][] = $this->title;

//var_dump($data);
//die();

?>
<div class="content-area">
	<table class="basic product-category">
		<tr>
			<th><span>Вибір</span></th>
			<th><span>Назва</span></th>
			<th><span>Тип</span></th>
			<th><span>Категорії</span></th>
			<th><span>url</span></th>
		</tr>
		<?php foreach($data as $val): ?>
			<tr>
				<td class="right-border"><input class="action_box" value="<?=$val->id?>" type="checkbox"></td>
				<td class="right-border">
          <a class="product_link_to_site" href="<?= Url::to('../gallery/' . $val->url . '/index') ?>"><?=$val->gallery_name?></a>
        </td>
				<td class="right-border"><?= ($val->gallery_type == 1) ? 'Фотогалерея' : 'Галерея кольорів'?></td>
				<td class="right-border"><?=Galleries::showCategories($val->gallery_categories)?></td>
				<td class="right-border"><?=$val->url?></td>
			</tr>
		<?php endforeach ?>
	</table>


</div>