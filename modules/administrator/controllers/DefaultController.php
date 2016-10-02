<?php

namespace app\modules\administrator\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\User;

/**
 * Default controller for the `administrator` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'except' => ['login'],
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
						'matchCallback' => function ($rule, $action) {
							return User::isUserAdmin(Yii::$app->user->identity->username);
						}
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



    public function actionIndex()
    {
        return $this->render('index');
    }
}
