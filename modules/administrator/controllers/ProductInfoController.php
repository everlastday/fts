<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\models\ProductInfo;

use yii\data\ActiveDataProvider;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use yii\web\UploadedFile;

/**
 * ProductInfoController implements the CRUD actions for ProductInfo model.
 */
class ProductInfoController extends DefaultController
{
    //public $layout = 'cp';

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
     * Lists all ProductInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = ProductInfo::find()->joinWith('category')->asArray()->all();

        //echo "<pre>";
        //
        //print_r($dataProvider);
        //
        //echo "</pre>";

        $image_url = Yii::getAlias('@web/uploads/product_info_images/');

        return $this->render('index', [
            'data' => $dataProvider,
            'image_url' => $image_url,
        ]);
    }

    /**
     * Displays a single ProductInfo model.
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
     * Creates a new ProductInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductInfo();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file->size !== 0) {
                $model->upload();
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->file = UploadedFile::getInstance($model, 'file');
        if (is_object($model->file) and $model->file->size !== 0) {
            if ($model->upload()) {
            }

        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {

            //echo '123';

            $post = Yii::$app->request->post();

            if(isset($post['id']) and is_numeric($post['id'])) {


                //$items = ['result' => $this->findModel($post['id'])->delete()];


                $model = $this->findModel($post['id']);

                //$path_to_frontend = '../..' . \Yii::$app->urlManagerFrontend->createUrl('/') . 'uploads/product_info_images/';

	            $path_to_frontend = Yii::getAlias('@webroot/uploads/product_info_images/');

                if(isset($model->product_image) and !empty($model->product_image)) {

                    $image = $path_to_frontend . $model->product_image;
                    $image_small = $path_to_frontend . 'small_' . $model->product_image;

                    if(file_exists($image)) unlink($image);
                    if(file_exists($image_small)) unlink($image_small);

                }
                //
                $items = [ 'result' => $model->delete()] ;



                \Yii::$app->response->format = 'json';

                return $items;
            }



        }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
