<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;

class CartController extends Controller {


	public function actionIndex() {

		$session = Yii::$app->session;
		$session->open();

		var_dump($_SESSION['cart']);
		die();
		return $this->render('index');
	}
}