<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FtsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/normalize.min.css',
    ];
    public $js = [
        //'js/jquery-1.11.0.min.js',
        //'js/responsiveCarousel.min.js',
        'js/vendor/modernizr-2.8.3.min.js',
        'js/plugins.js',
        //'js/jquery.glide.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
