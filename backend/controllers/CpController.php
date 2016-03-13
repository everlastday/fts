<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class CpController extends Controller
{

    /**
     * @inheritdoc
     */
    public $layout = 'cp';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow'   => true,
                    ],
                    [
                        'actions' => [
                            'logout',
                            'index',
                            'product-category',
                            'users',
                            'admins',
                            'orders-active',
                            'orders-archive',
                            'orders-complete',
                            'photo-groups',
                            'photo-gallery',
                            'color-options'
                        ],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'login';
        if ( ! \Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProductCategory()
    {
        return $this->render('product-category');
    }

    public function actionAdmins()
    {
        return $this->render('admins');
    }

    public function actionUsers()
    {
        return $this->render('users');
    }

    public function actionOrdersComplete()
    {
        return $this->render('orders-complete');
    }

    public function actionOrdersActive()
    {
        return $this->render('orders-active');
    }

    public function actionOrdersArchive()
    {
        return $this->render('orders-archive');
    }

    public function actionPhotoGallery()
    {
        return $this->render('photo-gallery');
    }

    public function actionPhotoGroups()
    {
        return $this->render('photo-groups');
    }

    public function actionColorOptions()
    {
        return $this->render('color-options');
    }
}
