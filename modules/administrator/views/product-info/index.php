<?php


use yii\helpers\Url;
use yii\helpers\Html;


$this->title = 'Адмінка - Менеджер товарів';
$this->params['breadcrumbs'] = [
    ['label' => 'Менеджер товарів'],
    //['label' => 'Менеджер товарів', 'url' => ['/']],
]


?>


<div class="content-area">

    <?php
    //echo "<pre>";
    //print_r($data);
    //echo "</pre>";
    ?>


    <table class="basic">

        <tr>
            <th><span>Вибір</span></th>
            <th><span>№</span></th>
            <th><span>Фото</span></th>
            <th><span>Назва</span></th>
            <th><span>Статус</span></th>
            <th><span>Наявність</span></th>
            <th><span>Категорія</span></th>
        </tr>
        <?php foreach($data as $val): ?>
        <tr>
            <td class="right-border"><input class="action_box" value="<?=$val['id']?>" type="checkbox"></td>
            <td class="right-border"><?=$val['id']?></td>
            <td class="right-border">
	            <?=(isset($val['product_image']) and !empty($val['product_image'])) ? Html::img($image_url . 'x65_' . $val['product_image'], ['class' => 'small_product_image']) : ''?>
            <td class="right-border">
		        <a target="_blank" class="product_link_to_site" href="<?= Url::to('/product/' . $val['url']) ?>"><?=$val['name']?></a>
	        </td>
            <td>
	            <?= Html::img('@web/images/admin/status-in-stock.png') ?>

            </td>
            <td>
	            <?= Html::img('@web/images/admin/status-in-stock.png') ?>
            </td>
            <td><?=$val['category']['category_name']?></td>
        </tr>
        <?php endforeach ?>

        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">1</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">2</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">3</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">4</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">5</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">6</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">7</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">8</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td><img src="/images/status-in-stock.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">9</td>-->
        <!--    <td class="right-border"><img class="small_product_image" src="/images/product.jpg" /></td>-->
        <!--    <td>Акрилова Штукатурка</td>-->
        <!--    <td><img src="/images/status-out.png" /></td>-->
        <!--    <td><img src="/images/status-out.png" /></td>-->
        <!--    <td>Штукатурки</td>-->
        <!--</tr>-->
    </table>
</div>
