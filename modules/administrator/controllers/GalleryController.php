<?php

namespace app\modules\administrator\controllers;

use app\models\Galleries;
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
    public function actionIndex($gallery_url)
    {
	    $galleries_id = Galleries::findOne(['url' => $gallery_url]);
	    if($galleries_id !== null) {
		    $gallery_items = Gallery::find()->where(['galleries_id' => $galleries_id->id])->asArray()->all();
		    return $this->render('index', [
			    'gallery_images' => $gallery_items,
			    'gallery_name' => $galleries_id->gallery_name,
		    ]);
	    } else {
		    echo 'nothing found';
	    }
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
    public function actionCreate($gallery_url)
    {
    	//$gallery_url = Yii::$app->controller->actionParams['gallery_url'];

    	//var_dump( Yii::$app->controller); die();


        $model = new Gallery();
	    $model->scenario = 'create';
	    $galleries = Galleries::findOne(['url' => $gallery_url]);

	    //var_dump($galleries); die();


	    // 1 photogallery
	    // 2 color
	    $gallery_type = $galleries->gallery_type;

	    // Якщо не існує галареї - перекидуэм на таблицю з всіма галереями
	    if($galleries == NULL) {
	    	return $this->redirect(['galleries/index']);
	    }

	    //var_dump($model); die();

	    if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
		    $model->file = UploadedFile::getInstance($model, 'file');

		    if ($model->file->size !== 0) {
			    $filename = $model->upload($gallery_url, Yii::$app->controller->id, $gallery_type);
		    }

			if(!empty($filename)) {

				$model->file->tempName = $filename;

				//var_dump($model); die();
				if($model->save()) {
					return $this->redirect(['gallery/' . $gallery_url . '/index']);
				}
			}
		    \Yii::$app->getSession()->setFlash('error', 'Не вдалось добавити зображення');
		    return $this->redirect(['gallery/' . $gallery_url . '/index']);


	    } else {
		    return $this->render('create', [
			    'model' => $model,
			    'gallery' => $galleries,
		    ]);
	    }



        //if (Yii::$app->request->isPost) {
	    	////var_dump(Yii::$app->request->post()); die();
        //    $model->file = UploadedFile::getInstance($model, 'file');
        //
        //    //var_dump($model->file); die();
        //    if ($model->file->size !== 0) {
        //
        //    	//var_dump(Yii::$app->controller->id); die();
        //        $filename = $model->upload($gallery_url, Yii::$app->controller->id);
        //        if($filename != false) {
	     //           $model->file->name = $filename;
        //        }
        //    }
        //}


        //var_dump($filename); die();

        //var_dump($model); die();

        //if($model->load(Yii::$app->request->post())) {
	    	//$model-
        //   var_dump($model); die();
        //}




        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //
	    	//
        //} else {
        //
        //}
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $gallery_url)
    {
        $model = $this->findModel($id);
	    $galleries = Galleries::findOne(['id' => $model->galleries_id]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ Yii::$app->controller->id . '/' . $galleries->url . '/index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'gallery' => $galleries,
            ]);
        }
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($gallery_url)
    {

        if (Yii::$app->request->isAjax) {


            $post = Yii::$app->request->post();

            if(isset($post['id']) and is_numeric($post['id'])) {

                $model = $this->findModel($post['id']);

	            $path_to_frontend = Yii::getAlias('@webroot/uploads/' .  Yii::$app->controller->id . '/' . $gallery_url . '/');
	            //$path_to_frontend = '../..' . \Yii::$app->urlManagerFrontend->createUrl('/') . 'uploads/gallerys/';

                if(isset($model->img) and !empty($model->img)) {

                    $image = $path_to_frontend . $model->img;
                    $image_small = $path_to_frontend . 'small_' . $model->img;
                    $image_tiny = $path_to_frontend . 'tiny_' . $model->img;

                    if(file_exists($image)) unlink($image);
                    if(file_exists($image_small)) unlink($image_small);
                    if(file_exists($image_tiny)) unlink($image_tiny);

                }
                //
                $items = [ 'result' => $model->delete(), 'Фотографія успішно видалена'];

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
