<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\models\ProductAttributes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttributesController implements the CRUD actions for ProductAttributes model.
 */
class AttributesController extends Controller
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
     * Lists all ProductAttributes models.
     * @return mixed
     */
    public function actionIndex()
    {

	    $data = ProductAttributes::find()->with('productCategory')->all();



        return $this->render('index', [
            'data' => $data,
        ]);
    }

    /**
     * Displays a single ProductAttributes model.
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
     * Creates a new ProductAttributes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductAttributes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductAttributes model.
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
     * Deletes an existing ProductAttributes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    //public function actionDelete($id)
    //{
    //    $this->findModel($id)->delete();
    //
    //    return $this->redirect(['index']);
    //}

	public function actionDelete() {
		if ( Yii::$app->request->isAjax ) {

			$post = Yii::$app->request->post();
			//$this->findModel($id)->delete();
			if ( isset( $post[ 'id' ] ) and is_numeric( $post[ 'id' ] ) ) {
				$items = [ 'result' => $this->findModel( $post[ 'id' ] )->delete(), 'msg' => 'Атрибут успішно видалений' ];
				\Yii::$app->response->format = 'json';

				return $items;
			}
		}
		//return $this->redirect(['index']);
	}


	/**
     * Finds the ProductAttributes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductAttributes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductAttributes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
