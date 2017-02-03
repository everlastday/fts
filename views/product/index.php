<?php
use yii\helpers\Url;
$this->title = $data['name'];
$this->params['breadcrumbs'][] = $this->title;

?>


    <?php

    // print_r($data);
    ?>

    <div class="products-description-cart">
        <div class="product-img">
            <?=(isset($data['product_image']) and !empty($data['product_image'])) ? '<img src="/uploads/product_info_images/x300_' .  $data['product_image'] . '" alt="" title="">' : ''; ?>

            <div class="product-description-general">
                <?=(isset($data['params']) and !empty($data['params'])) ? $data['params'] : ''; ?>


            </div>
            <div>
                <?php //if(!empty($data['colors_url'])): ?>
                    <a class="btn-red" href="<?=Url::toRoute(['product/buy', 'id' => $data['url']]); ?>">ЗАМОВИТИ</a>
                <?php //endif ?>
            </div>

        </div>
        <div class="product-content">
            <h5 class="title"><?=(isset($data['category']['category_name']) and !empty($data['category']['category_name'])) ? $data['category']['category_name'] : ''; ?></h5>
            <h1 class="title"><?=(isset($data['name']) and !empty($data['name'])) ? $data['name'] : ''; ?></h1>

            <?=(isset($data['info']) and !empty($data['info'])) ? $data['info'] : ''; ?>

        </div>
      <div style="max-width: 17em;">
	      <?php if(!empty($data['gallery_id'])): ?>
            <a class="btn-grey" href="<?= '/page/' . $data['colors_url'] ?>">Взірці кольорів</a>
	      <?php endif ?>
      </div>

        <div class="clearfix"></div>
        <?php
        //    if(stripos($data['category']['category_name'], 'Грунт') !== false)
        //    {
        //        //echo 'yes';
        //    }
        //    else
        //    {
        //        //echo $data['category']['category_name'];
        //    }
        //?>



        <?php if(stripos($data['category']['category_name'], 'Грунт') === false): ?>
            <div class="also-buy">
                <p class="title">З цим товаром також замовляють: <? //$data['category']['category_name'] ?></p>

                <div class="container">
                    <div class="also-buy-item">

                        <img src="/images/description-image-sample5.jpg" alt="" title="">

                        <p class="description">
                            <strong>Грунт FTS QUARTZ LINE</strong></br> для підготовки (грунтування) поверхні перед
                            нанесенням
                            декоративної штукатурки</p>

                    </div>
                    <div class="also-buy-item">

                        <img src="/images/description-image-sample6.jpg" alt="" title="">

                        <p><strong>ГРУНТ ГЛИБОКОГО ПРОНИКНЕННЯ</strong> </br>для зміцнення мінеральних поверхонь перед
                            виконанням оздоблювальних,
                            </br> теплоізоляційних, гідроізоляційних та інших робіт.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php else: ?>
            <div class="also-buy">
                <p class="title">З цим товаром також замовляють: <? //$data['category']['category_name'] ?></p>

                <div class="container">
                    <div class="also-buy-item">

                        <img src="/images/description-image-sample3.png" alt="" title="">

                        <p class="description">
                            <strong>Штукатурка STRUCTURE LINE</strong></br> Акрилова декоративна штукатурка використовується для зовнішніх та внутрішніх робіт.</p>

                    </div>
                    <div class="also-buy-item">

                        <img src="/images/description-image-sample4.png" alt="" title="">

                        <p><strong>Штукатурка STONE LINE DECOR</strong> </br> Мозаїчна декоративна штукатурка використовується для зовнішніх та внутрішніх робіт.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php endif; ?>

    </div>
