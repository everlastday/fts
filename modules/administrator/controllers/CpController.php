<?php
namespace app\modules\administrator\controllers;

use Yii;
use app\models\LoginForm;


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
		return $this->render( 'orders-active' );
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
