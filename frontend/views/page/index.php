<?php
/* @var $this yii\web\View */
use frontend\assets\GalleryAsset;


if(isset($data['gallery']) and $data['gallery'] > 0) {

    GalleryAsset::register($this);
}


$this->title = (isset($data['title']) and !empty($data['title'])) ? $data['title'] : '';;
?>





<?=(isset($data['page']) and !empty($data['page'])) ? $data['page'] : ''; ?>