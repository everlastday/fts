<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PageController implements the CRUD actions for Pages model.
 */
class PageController extends DefaultController
{
	//public $layout = 'cp';
	//
	//
	//public function behaviors()
	//{
	//    return [
	//        'access' => [
	//            'class' => AccessControl::className(),
	//            'rules' => [
	//                [
	//                    'actions' => ['login', 'error'],
	//                    'allow'   => true,
	//                ],
	//                [
	//                    'actions' => [
	//                        'logout',
	//                        'index',
	//                        'create',
	//                        'update',
	//                        'delete',
	//                    ],
	//                    'allow'   => true,
	//                    'roles'   => ['@'],
	//                ],
	//            ],
	//        ],
	//        'verbs' => [
	//            'class' => VerbFilter::className(),
	//            'actions' => [
	//                'delete' => ['post'],
	//            ],
	//        ],
	//    ];
	//}

    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = Pages::find()->asArray()->all();

        return $this->render('index', [
            'data' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {

        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();

            if(isset($post['id']) and is_numeric($post['id'])) {

                $items = ['result' => $this->findModel($post['id'])->delete()];

                \Yii::$app->response->format = 'json';

                return $items;
            }
        }
        return false;

    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
