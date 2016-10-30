<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\models\Galleries;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleriesController implements the CRUD actions for Galleries model.
 */
class GalleriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Galleries models.
     * @return mixed
     */
    //public function actionIndex()
    //{
    //    $dataProvider = new ActiveDataProvider([
    //        'query' => Galleries::find(),
    //    ]);
    //
    //    return $this->render('index', [
    //        'dataProvider' => $dataProvider,
    //    ]);
    //}

	public function actionIndex() {

		return $this->render( 'index', [
			'data' => Galleries::find()->all()
		]);
	}



    /**
     * Displays a single Galleries model.
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
     * Creates a new Galleries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Galleries();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

	        $uploads = Yii::getAlias('@webroot/uploads');
	        $galleries = $uploads . '/galleries';

	        if(!is_dir($galleries)) {
		        FileHelper::createDirectory($galleries, '0750');
	        }

	        $gallery_folder =  $galleries . '/' . $model->url;
	        if(!is_dir($gallery_folder)){
		        FileHelper::createDirectory($gallery_folder, '0750');
	        }

	        return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Galleries model.
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

	public function actionDelete() {
		if ( Yii::$app->request->isAjax ) {
			$post = Yii::$app->request->post();
			if ( isset( $post[ 'id' ] ) and is_numeric( $post[ 'id' ] ) ) {
				$model = $this->findModel( $post[ 'id' ] );

				$url = $model->url;

				$items = [ 'result' => $model->delete() ];

				// Якщо успішно видалено з бази, то видаляєм папку
				if($items['result'] == 1) {
					$galleries = Yii::getAlias('@webroot/uploads/galleries');

					$gallery_folder =  $galleries . '/' . $url;
					if(is_dir($gallery_folder)){
						FileHelper::removeDirectory($gallery_folder);
					}
				}
				\Yii::$app->response->format = 'json';

				return $items;
			}
		}
	}

    /**
     * Finds the Galleries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Galleries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Galleries::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
