<?php
$this->title = 'Взірці кольорів | опції';
$this->params['breadcrumbs'] = [
    ['label' => 'Опції'],
]
?>

<div class="content-area">
    <div class="background-square-grey">
        <form action="" id="color-options-form" enctype="multipart/form-data">
            <div class="field-group">
                <label for="product-category">Категорія товару:</label>
                <input class="xlarge" type="text" name="product-category" />
            </div>
            <div class="field-group">
                <label for="catalog_num">№ по каталогу:</label>
                <input class="large" type="text" name="catalog_num" />
            </div>
            <div class="field-group">
                <label for="upload_image">Завантажити зображення:</label>
                <input type="file" name="upload_image" accept="image/jpeg,image/png,image/gif" />
            </div>
            <div class="images-uploaded-container">
                <ul>
                    <li><img src="/images/ex6.jpg" alt=""></li>
                    <li><img src="/images/ex6.jpg" alt=""></li>
                </ul>
            </div>
            <div class="field-group">
                <label for="catalog_num">Цінова група:</label>
                <input type="text" name="price_group" />
            </div>
            <div class="field-group">
                <label for="weight">Вага:</label>
                <input type="text" name="weight" />
            </div>
            <a href="#" class="btn-color-options">Зберегти опції</a>
        </form>
    </div>
</div>
