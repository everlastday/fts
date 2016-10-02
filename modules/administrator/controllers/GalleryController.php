<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\models\Gallery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends DefaultController
{
    //public $layout = 'cp';
    //
    //public function behaviors()
    //{
    //    return [
    //        'verbs' => [
    //            'class' => VerbFilter::className(),
    //            'actions' => [
    //                'delete' => ['post'],
    //            ],
    //        ],
    //    ];
    //}

    /**
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $gallery_items = Gallery::find()->asArray()->all();


        return $this->render('index', [
            'gallery_images' => $gallery_items,
        ]);
    }

    /**
     * Displays a single Gallery model.
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
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gallery();

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
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {

        if (Yii::$app->request->isAjax) {


            $post = Yii::$app->request->post();

            if(isset($post['id']) and is_numeric($post['id'])) {

                $model = $this->findModel($post['id']);

	            $path_to_frontend = Yii::getAlias('@webroot/uploads/gallerys/');
	            //$path_to_frontend = '../..' . \Yii::$app->urlManagerFrontend->createUrl('/') . 'uploads/gallerys/';

                if(isset($model->img) and !empty($model->img)) {

                    $image = $path_to_frontend . $model->img;
                    $image_small = $path_to_frontend . 'small_' . $model->img;

                    if(file_exists($image)) unlink($image);
                    if(file_exists($image_small)) unlink($image_small);

                }
                //
                $items = [ 'result' => $model->delete()];

                \Yii::$app->response->format = 'json';

                return $items;
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
