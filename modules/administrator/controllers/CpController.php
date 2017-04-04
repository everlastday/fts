<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\models\LoginForm;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use app\models\Gallery;
use app\models\Orders;
use app\models\ProductInfo;

/**
 * Site controller
 */
class CpController extends DefaultController {

	public function beforeAction( $action ) {
		$this->enableCsrfValidation = ( $action->id !== "logout" );

		return parent::beforeAction( $action );
	}

	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionIndex() {
		return $this->render( 'index' );
	}

	public function actionLogin() {
		$this->layout = "login";
		if ( ! \Yii::$app->user->isGuest ) {
			return $this->goHome();
		}
		$model = new LoginForm();
		if ( $model->load( Yii::$app->request->post() ) && $model->loginAdmin() ) {
			return $this->redirect( Yii::$app->urlManager->createUrl( "administrator" ) );
			//return $this->goBack();
		} else {
			return $this->render( 'login', [
				'model' => $model,
			] );
		}
	}

	public function actionLogout() {
		Yii::$app->user->logout();

		return $this->redirect( Yii::$app->urlManager->createUrl( "administrator/cp/login" ) );
	}

	public function actionProductCategory() {
		return $this->render( 'product-category' );
	}

	public function actionAdmins() {
		return $this->render( 'admins' );
	}

	public function actionUsers() {
		return $this->render( 'users' );
	}


	//public function actionOrdersActive() {
	//	$query      = Orders::find();
	//	$countQuery = clone $query;
	//	$pages      = new Pagination( [
	//		'totalCount' => $countQuery->count(),
	//		'pageSize'   => 15
	//	] );
	//	$orders   = $query->offset( $pages->offset )->limit( $pages->limit )->all();
	//	$products = ProductInfo::find()->joinWith( 'category' )->asArray()->all();
	//	$products = ArrayHelper::index( $products, 'id' );
	//	$colors   = Gallery::find()->joinWith( 'galleries' )->where( [ 'gallery_type' => 2 ] )->asArray()->all();
	//	$colors   = ArrayHelper::index( $colors, 'id' );
	//	//$products = array();
	//	//var_dump($products); die();
	//	return $this->render( 'orders-active', [
	//		'orders'   => $orders,
	//		'products' => $products,
	//		'colors'   => $colors,
	//		'pages'    => $pages,
	//	] );
	//}

	public function actionAjaxAddPayment() {
		if ( Yii::$app->request->isAjax ) {
			$post = Yii::$app->request->post();
			if ( isset( $post[ 'id' ] ) and is_numeric( $post[ 'id' ] ) ) {
				$orders = Orders::findOne( $post[ 'id' ] );
				if ( ! empty( $orders->id ) ) {
					$orders->payed = 1; // Устанавливаем флажок оплачено
					if ( $orders->save() ) {
						echo 1;
						exit();
					}
				}
			}
			echo false;
			exit();
		}
	}
	public function actionAjaxChangeStatus() {
		if ( Yii::$app->request->isAjax ) {
			$post   = Yii::$app->request->post();
			$status = 0;
			switch ( $post[ 'status' ] ) {
				case 'processed':
					$status = 5;
					break;
				case 'completed':
					$status = 10;
					break;
				case 'canceled':
					$status = 100;
					break;
			}
			if ( isset( $post[ 'id' ] ) and is_numeric( $post[ 'id' ] ) and $status > 0 ) {
				$orders = Orders::findOne( $post[ 'id' ] );
				if ( ! empty( $orders->id ) ) {
					$orders->status = $status;
					if ( $orders->save() ) {
						echo 1;
						exit();
					}
				}
			}
			echo false;
			exit();
		}
	}
	public function actionOrders($id = 0) {

		if($id == 'new') {
			$query      = Orders::find()->where(['status' => 1]);
			$order_title = 'Нові';
		} elseif($id == 'active') {
			$query      = Orders::find()->where(['status' => 5]);
			$order_title = 'Активні';
		} elseif($id == 'archive') {
			$query      = Orders::find()->where(['status' => 10])->orWhere(['status' => 100]);
			$order_title = 'Архівні';
		} elseif(is_numeric($id)) {
			if($id > 1000) {
				$id -= 1000;
			}
			$query      = Orders::find()->where(['id' => $id]);
			$order_title = 'Перегляд';
		} else {
			$query      = Orders::find();
			$order_title = 'Всі';
		}

		$status_colors = [
				1 => [
					'color-status' => 'new',
					'text-status' => 'Нове',
				],
				5 => [
					'color-status' => 'accepted',
					'text-status' => 'Активне',
				],
				10 => [
					'color-status' => 'completed',
					'text-status' => 'Завершено',
				],
		        100 => [
					'color-status' => 'cenceled',
					'text-status' => 'Відмінено',
				]
		];


		$countQuery = clone $query;
		$pages      = new Pagination( [
			'totalCount' => $countQuery->count(),
			'pageSize'   => 15
		] );
		$orders   = $query->offset( $pages->offset )->limit( $pages->limit )->all();
		$products = ProductInfo::find()->joinWith( 'category' )->asArray()->all();
		$products = ArrayHelper::index( $products, 'id' );
		$colors   = Gallery::find()->joinWith( 'galleries' )->where( [ 'gallery_type' => 2 ] )->asArray()->all();
		$colors   = ArrayHelper::index( $colors, 'id' );
		//$products = array();
		//var_dump($products); die();
		return $this->render( 'orders-active', [
			'orders'   => $orders,
			'products' => $products,
			'colors'   => $colors,
			'pages'    => $pages,
		    'status_colors'  => $status_colors,
		    'order_title' => $order_title
		]);


	}

	public function actionDelete() {
		if ( Yii::$app->request->isAjax ) {
			$post = Yii::$app->request->post();
			if ( isset( $post[ 'id' ] ) and is_numeric( $post[ 'id' ] ) ) {
				$items =  ['result' => Orders::deleteAll('id = ' .$post[ 'id' ]) > 0 ? 2 : false];
				//$items =  ['result' => 2];

				\Yii::$app->response->format = 'json';

				return $items;
			}
		}
		//return $this->redirect(['index']);
	}

	public function actionSend() {
		Yii::$app->mailer->compose()
		                 ->setFrom('site@fts.ua')
		                 ->setTo('site@fts.ua')
		                 ->setSubject('Тема сообщения')
		                 ->setTextBody('Текст сообщения')
		                 ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
		                 ->send();

	}

}
