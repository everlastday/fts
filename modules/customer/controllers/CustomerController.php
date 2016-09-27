<?php
namespace app\modules\customer\controllers;

use app\models\SignupCustomerForm;
use Yii;
use app\models\LoginForm;
use yii\bootstrap\ActiveForm;

class CustomerController extends DefaultController {


	public function beforeAction( $action ) {
		$this->enableCsrfValidation = ( $action->id !== "logout" );

		return parent::beforeAction( $action );
	}

	public function actions() {
		return [
			'captcha' => [
				//'class' => 'yii\captcha\CaptchaAction',
				'class'           => 'app\models\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}


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

	//public function actionSignup() {
	//	$model = new SignupCustomerForm();
	//	//var_dump(Yii::$app->request->post());
	//	if ( Yii::$app->request->isAjax && $model->load( Yii::$app->request->post() ) ) {
	//		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	//
	//		return ActiveForm::validate( $model );
	//	}
	//	if ( $model->load( Yii::$app->request->post() ) ) {
	//		if ( $user = $model->signup() ) {
	//			if ( Yii::$app->getUser()->login( $user ) ) {
	//				//return $this->goHome();
	//				//return $this->redirect(['customer/index']);
	//				return $this->redirect( Yii::$app->urlManager->createUrl( "customer" ) );
	//			}
	//		}
	//	}
	//	$login        = new LoginForm();
	//	$this->layout = '@app/views/layouts/main.php';
	//
	//	return $this->render( 'login', [
	//		'model' => $login,
	//		'users' => $model,
	//	] );
	//}
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
		$model    = new LoginForm();
		$register = new SignupCustomerForm();
		//$post = Yii::$app->request->post();
		if ( ! \Yii::$app->user->isGuest ) {
			return $this->goHome();
		}
		if ( Yii::$app->request->post() ) {
			if ( ! empty( Yii::$app->request->post( "LoginForm" ) ) ) {
				if ( $model->load( Yii::$app->request->post() ) && $model->login() ) {
					return $this->redirect( Yii::$app->urlManager->createUrl( "customer" ) );
				}
			} elseif ( ! empty( Yii::$app->request->post( "SignupCustomerForm" ) ) ) {
				if ( Yii::$app->request->isAjax && $register->load( Yii::$app->request->post() ) ) {
					Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

					return ActiveForm::validate( $register );
				}
				if ( $register->load( Yii::$app->request->post() ) ) {
					if ( $user = $register->signup() ) {
						if ( Yii::$app->getUser()->login( $user ) ) {
							//return $this->goHome();
							//return $this->redirect(['customer/index']);
							return $this->redirect( Yii::$app->urlManager->createUrl( "customer" ) );
						}
					}
				}
			}
		}

		return $this->render( 'login', [
			'model' => $model,
			'users' => $register,
		] );
	}

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout() {
		Yii::$app->user->logout();

		//return $this->goHome();
		return $this->redirect( Yii::$app->urlManager->createUrl( "customer/login" ) );
	}


}
