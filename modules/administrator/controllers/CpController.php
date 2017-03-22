<?php
namespace app\modules\administrator\controllers;

use app\models\Gallery;
use app\models\Orders;
use app\models\ProductInfo;
use Yii;
use app\models\LoginForm;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;


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
		//return $this->goHome();
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

	public function actionOrdersComplete() {
		return $this->render( 'orders-complete' );
	}

	public function actionOrdersActive() {

		$query = Orders::find();
		$countQuery = clone $query;
		$pages = new Pagination([
			'totalCount' => $countQuery->count(),
		    'pageSize' => 15
		]);

		$orders = $query->offset($pages->offset)
		                ->limit($pages->limit)
		                ->all();
		$products = ProductInfo::find()->joinWith( 'category' )->asArray()->all();
		$products = ArrayHelper::index( $products, 'id' );
		$colors = Gallery::find()->joinWith('galleries')->where(['gallery_type' => 2])->asArray()->all();
		$colors = ArrayHelper::index( $colors, 'id' );

		//$products = array();
		//var_dump($products); die();

		return $this->render( 'orders-active', [
			'orders' => $orders,
			'products' => $products,
		    'colors' => $colors,
			'pages' => $pages,
		]);
	}

	public function actionOrdersArchive() {


		return $this->render( 'orders-archive' );
	}

	public function actionPhotoGallery() {
		return $this->render( 'photo-gallery' );
	}

	public function actionPhotoGroups() {
		return $this->render( 'photo-groups' );
	}

	public function actionColorOptions() {
		return $this->render( 'color-options' );
	}
}
