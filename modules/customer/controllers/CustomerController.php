<?php
namespace app\modules\customer\controllers;

use app\models\SignupCustomerForm;
use Yii;
use app\models\LoginForm;
use yii\bootstrap\ActiveForm;
use app\models\User;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use app\models\Gallery;
use app\models\Orders;
use app\models\ProductInfo;

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

		$report = [];
		$all_orders = Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->asArray()->all();

		foreach ($all_orders as $val) {
			$report['total_sum'] += json_decode($val["total_price"])->total;
		}

		$report['all_orders'] = count($all_orders);

		$report['active'] = count(Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status' => [1,5]])->asArray()->all());
		$report['payed'] = count(Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['payed' => 1])->asArray()->all());
		$report['unpaid'] = count(Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['payed' => 0])->asArray()->all());
		$report['complete'] = count(Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status' => 10])->asArray()->all());
		//$report['total_sum'] = 1000;



		return $this->render( 'index', ['report' => $report] );
	}


	public function actionOrdersStatus() {

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
		$model           = $this->findModel( Yii::$app->user->identity->id );
		$model->scenario = 'client';
		if ( $model->load( Yii::$app->request->post() ) ) {
			if ( Yii::$app->request->isAjax ) {
				Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

				return ActiveForm::validate( $model );
			}
			//var_dump($model); die();
			$model->setPassword( $model->new_password );
			$model->generateAuthKey();
			$model->save();
		}
		//
		//
		//var_dump(Yii::$app->user->identity->id);
		//die();
		return $this->render( 'info', [
			'model' => $model,
		] );
	}


	public function actionCart() {
		return $this->render( 'cart' );
	}

	public function actionOrderHistory() {
		return $this->render( 'orders-history' );
	}

	protected function findModel( $id ) {
		if ( ( $model = User::findOne( $id ) ) !== null ) {
			return $model;
		} else {
			throw new NotFoundHttpException( 'The requested page does not exist.' );
		}
	}


	public function actionOrders($id = 'active') {

		if($id == 'active') {
			$query = Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status' => [1,5]])->orderBy(['id' => SORT_DESC]);
		} elseif($id == 'complete') {
			$query = Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status' => 10])->orderBy(['id' => SORT_DESC]);
		} elseif($id == 'canceled') {
			$query = Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status' => 100])->orderBy(['id' => SORT_DESC]);
		} else {
			$query = Orders::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy(['id' => SORT_DESC]);
		}

		$status_colors = [
			1 => [
				'color-status' => 'accepted',
				'text-status' => 'Активне',
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

		$orders = [
			'orders' => $orders,
			'products' => $products,
			'colors' => $colors,
			'pages' => $pages,
		    'status' => $id,
		    'status_colors' => $status_colors
		];
		return $this->render( 'orders-status', $orders);
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
		$model        = new LoginForm();
		$register     = new SignupCustomerForm();
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
