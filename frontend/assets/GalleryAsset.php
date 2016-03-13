<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class GalleryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js',
        'js/fliplightbox.min.js',
        'js/fliplightboxActivate.js',
    ];
    public $depends = [

    ];
}
