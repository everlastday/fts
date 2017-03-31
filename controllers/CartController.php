<?php

namespace app\controllers;

use app\models\Gallery;
use app\models\Orders;
use app\models\SignupCustomerForm;
use yii\web\Controller;
use Yii;
use app\models\ProductInfo;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

class CartController extends Controller {


	public function actionIndex() {
		$session = Yii::$app->session;
		$session->open();
		$cart_items               = $_SESSION[ 'cart' ];
		$_SESSION[ 'cart_total' ] = [
			'goods_total'    => 0,
			'delivery_total' => 0, // поле для доставки (поки поле не задіяно)
			'total'          => 0, // загальна сума всіх товарів
		];
		if ( ! empty( $cart_items ) and is_array( $cart_items ) ) {
			$product_info_ids = array();
			$color_ids        = array();
			foreach ( $cart_items as $cart_id => $item ) {
				$product_info_ids[]                        = $item[ 'product_id' ];
				$color_ids[]                               = $item[ 'color' ];
				$_SESSION[ 'cart_total' ][ 'goods_total' ] += ( $item[ 'price' ] * $item[ 'quantity' ] );
				//$product_id = ProductInfo::find()->where(['id' => [1,4,3,5]])->all();
				//var_dump($product_id); die();
			}
			$products               = ProductInfo::find()->where( [ 'id' => $product_info_ids ] )->asArray()->all();
			$colors                 = Gallery::find()->where( [ 'id' => $color_ids ] )->with( 'galleries' )->asArray()->all();
			$products               = ArrayHelper::index( $products, 'id' );
			$colors                 = ArrayHelper::index( $colors, 'id' );
			$path_to_product_images = Yii::getAlias( '@webroot/uploads/product_info_images/' );
			//var_dump($products); die();
			$_SESSION[ 'cart_total' ][ 'total' ] = $_SESSION[ 'cart_total' ][ 'goods_total' ] + $_SESSION[ 'cart_total' ][ 'delivery_total' ];
		}
		//var_dump($_SESSION['cart']); die();
		//die();
		$order_model = new Orders();
		if ( empty( $order_model->fio ) and ! empty( Yii::$app->user->identity->name ) ) {
			$order_model->fio = ( ! empty( Yii::$app->user->identity->surname ) ? Yii::$app->user->identity->surname . ' ' : '' ) . Yii::$app->user->identity->name;
		}
		if ( empty( $order_model->phone ) and ! empty( Yii::$app->user->identity->phone ) ) {
			$order_model->phone = Yii::$app->user->identity->phone;
		}
		if ( empty( $order_model->user_id ) and ! empty( Yii::$app->user->identity->id ) ) {
			$order_model->user_id = Yii::$app->user->identity->id;
		}

		return $this->render( 'index', [
			'products'               => $products,
			'colors'                 => $colors,
			'items'                  => $cart_items,
			'path_to_product_images' => $path_to_product_images,
			'cart_total'             => $_SESSION[ 'cart_total' ],
			'users'                  => $order_model,
		] );
	}

	public function actionConfirm() {
		//var_dump(Yii::$app->request->post());
		$register = new Orders();
		if ( ! empty( Yii::$app->request->post( "Orders" ) ) ) {
			if ( Yii::$app->request->isAjax && $register->load( Yii::$app->request->post() ) ) {
				Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

				return ActiveForm::validate( $register );
			}
			if ( Yii::$app->request->post() && $register->load( Yii::$app->request->post() ) ) {
				$session = Yii::$app->session;
				$session->open();
				$register->total_price = $_SESSION[ 'cart_total' ];
				$register->items       = $_SESSION[ 'cart' ];
				$register->status      = 1;
				$register->save();
			}
		}

		return $this->render( 'confirm', [] );
	}

}