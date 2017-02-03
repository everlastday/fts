<?php
namespace app\controllers;

use app\models\Gallery;
use yii\web\Controller;
use Yii;
use app\models\ProductInfo;
use yii\helpers\ArrayHelper;

class CartController extends Controller {


	public function actionIndex() {
		$session = Yii::$app->session;
		$session->open();
		$cart_items = $_SESSION[ 'cart' ];

		$_SESSION[ 'cart_total' ] = [
			'goods_total' => 0,
		    'delivery_total' => 50,
		    'total' => 0,
		];
		if ( ! empty( $cart_items ) and is_array( $cart_items ) ) {
			$product_info_ids = array();
			$color_ids        = array();
			foreach ( $cart_items as $cart_id => $item ) {
				$product_info_ids[] = $item[ 'product_id' ];
				$color_ids[]        = $item[ 'color' ];

				$_SESSION[ 'cart_total' ]['goods_total'] += ($item['price'] * $item['quantity']);
				//$product_id = ProductInfo::find()->where(['id' => [1,4,3,5]])->all();
				//var_dump($product_id); die();
			}
			$products = ProductInfo::find()->where( [ 'id' => $product_info_ids ] )->asArray()->all();
			$colors   = Gallery::find()->where( [ 'id' => $color_ids ] )->with( 'galleries' )->asArray()->all();
			$products = ArrayHelper::index( $products, 'id' );
			$colors   = ArrayHelper::index( $colors, 'id' );
			$path_to_product_images = Yii::getAlias( '@webroot/uploads/product_info_images/' );
			//var_dump($products); die();


			$_SESSION[ 'cart_total' ]['total'] =  $_SESSION[ 'cart_total' ]['goods_total'] + $_SESSION[ 'cart_total' ]['delivery_total'];
		}
		//var_dump($_SESSION['cart']); die();
		//die();
		return $this->render( 'index', [
			'products'               => $products,
			'colors'                 => $colors,
			'items'                  => $cart_items,
			'path_to_product_images' => $path_to_product_images,
		    'cart_total'             => $_SESSION['cart_total']
		] );
	}
}