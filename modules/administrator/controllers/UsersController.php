<?php
namespace app\modules\administrator\controllers;

use app\models\SignupForm;
use Yii;
use app\models\User;
use yii\web\NotFoundHttpException;
use yii\bootstrap\ActiveForm;

/**
 * Site controller
 */
class UsersController extends DefaultController {

	public function actionIndex() {

		$dataProvider = User::find()->where( [ 'role' => 1 ] )->all();

		return $this->render( 'index', [
				'users' => $dataProvider
			] );
	}

	public function actionCreate() {
		$model = new SignupForm();
		if ( $model->load( Yii::$app->request->post() ) ) {

			if ( Yii::$app->request->isAjax ) {
				Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				return ActiveForm::validate( $model );
			}

			if ( $user = $model->signup() ) {
				return $this->redirect( [ 'users/admins' ] );
			} else {
			}
		}

		return $this->render( 'create', [ 'user' => $model ] );
	}


	public function actionAdmins( $id = null ) {
		if ( ! empty( $id ) ) {
			//$dataProvider = User::findOne([
			//    'id' => $id,
			//    'status' => 10
			//]);
			$model = $this->findModel( $id );
			if ( $model->load( Yii::$app->request->post() ) ) {


				if ( Yii::$app->request->isAjax ) {
					Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

					return ActiveForm::validate( $model );
				}

				$model->setPassword( $model->new_password );
				$model->generateAuthKey();
				$model->save();
			}
			if ( ! empty( $model ) ) {
				return $this->render( 'details', [
						'user' => $model
					] );
			}
		}
		$dataProvider = User::find()->where( [ 'role' => 10 ] )->all();

		//var_dump($dataProvider);
		return $this->render( 'admins', [
				'users' => $dataProvider
			] );
	}


	protected function findModel( $id ) {
		if ( ( $model = User::findOne( $id ) ) !== null ) {
			return $model;
		} else {
			throw new NotFoundHttpException( 'The requested page does not exist.' );
		}
	}


	public function actionDelete() {
		if ( Yii::$app->request->isAjax ) {
			$post = Yii::$app->request->post();
			if ( isset( $post[ 'id' ] ) and is_numeric( $post[ 'id' ] ) ) {
				$items = [ 'result' => $this->findModel( $post[ 'id' ] )->delete() ];
				\Yii::$app->response->format = 'json';

				return $items;
			}
		}

		return false;
	}

}

