<?php
$this->title = 'Штукатурка акрилова';
?>
<div class="page-container">
    <div class="fts-breadcrums">
        <!-- <a class="home" href="#">На головну</a> / Вхід в магазин / Реєстрація -->
    </div>


    <?php

       // print_r($data);
    ?>

    <div class="products-description-cart">
        <div class="product-img">
            <?=(isset($data['product_image']) and !empty($data['product_image'])) ? '<img src="/uploads/product_info_images/' . $data['product_image'] . '" alt="" title="">' : ''; ?>

            <div class="product-description-general">
                <?=(isset($data['params']) and !empty($data['params'])) ? $data['params'] : ''; ?>


            </div>
            <div>
                <a class="btn-grey" href="/page/gallery-marmure">Взірці кольорів</a>
            </div>

        </div>

        <div class="product-content">
            <h5 class="title"><?=(isset($data['name']) and !empty($data['name'])) ? $data['name'] : ''; ?></h5>

            <?=(isset($data['info']) and !empty($data['info'])) ? $data['info'] : ''; ?>

        </div>

        <div class="clearfix"></div>
        <div class="also-buy">
            <p class="title">З цим товаром також замовляють:</p>

            <div class="container">
                <div class="also-buy-item">

                    <img src="/images/description-image-sample2.png" alt="" title="">

                    <p class="description">
                        <strong>Грунт FTS QUARTZ LINE</strong></br> для підготовки (грунтування) поверхні перед
                        нанесенням
                        декоративної штукатурки</p>

                </div>
                <div class="also-buy-item">

                    <img src="/images/grunt.png" alt="" title="">

                    <p><strong>ГРУНТ ГЛИБОКОГО ПРОНИКНЕННЯ</strong> </br>для зміцнення мінеральних поверхонь перед
                        виконанням оздоблювальних,
                        </br> теплоізоляційних, гідроізоляційних та інших робіт.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
