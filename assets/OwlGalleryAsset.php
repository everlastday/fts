<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;


class OwlGalleryAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/owl.carousel.min.css',
		//'css/owl.theme.default.min.css',
	];
	public $js = [
		'js/owl.carousel.min.js',
		'js/owl.carousel.activate.js',
	];


	public $depends = [
		'yii\web\JqueryAsset',
	];
}
