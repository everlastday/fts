<?php

namespace app\modules\customer\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `customer` module
 */
class DefaultController extends Controller
{
	//public function actions()
	//{
	//	return array(
	//		'captcha' => array(
	//			'class' => 'CCaptchaAction',
	//			'backColor' => 0xFFFFFF,
	//		),
	//	);
	//}


	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'except' => ['login', 'signup', 'captcha'],
				'rules' => [
					[
						// Для всіх
						'allow' => false,
						'roles' => ['?'],
					],
					[
						// Для авторизованих
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
