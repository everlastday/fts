<?php
namespace app\modules\customer\controllers;

use Yii;
use app\models\LoginForm;

class CustomerController extends DefaultController {

	public function actionIndex() {
		return $this->render( 'index' );
	}


	public function actionOrdersStatus() {
		return $this->render( 'orders-status' );
	}

	public function actionOrdersComplete() {
		return $this->render( 'orders-complete' );
	}

	public function actionOrdersAll() {
		return $this->render( 'orders-all' );
	}

	public function actionOrdersCanceled() {
		return $this->render( 'orders-canceled' );
	}

	public function actionInfo() {
		return $this->render( 'info' );
	}


	public function actionCart() {
		return $this->render( 'cart' );
	}

	public function actionOrderHistory() {
		return $this->render( 'orders-history' );
	}
	//public function actionRegister()
	//{
	//	//$this->layout = 'test';
	//	//echo Yii::app()->urlManager->parseUrl(Yii::app()->request);
	//
	//
	//	$model = new LoginForm();
	//
	//	if ($model->load(Yii::$app->request->post()) && $model->login()) {
	//		return $this->goBack();
	//	} else {
	//		return $this->render('register', [
	//			'model' => $model,
	//		]);
	//	}
	//
	//}
	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin() {
		$this->layout = '@app/views/layouts/main.php';
		if ( ! \Yii::$app->user->isGuest ) {
			return $this->goHome();
		}
		$model = new LoginForm();
		if ( $model->load( Yii::$app->request->post() ) && $model->login() ) {
			//return $this->goBack();
			return $this->redirect( Yii::$app->urlManager->createUrl( "customer/index" ) );
		} else {
			return $this->render( 'login', [
				'model' => $model,
			] );
		}
	}

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout() {
		Yii::$app->user->logout();

		return $this->goHome();
	}


}
