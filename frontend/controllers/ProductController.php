<?php

namespace frontend\controllers;

use common\models\ProductInfo;

class ProductController extends \yii\web\Controller
{
    public $layout = 'test';

    public function actionIndex()
    {

        $product_url =  \Yii::$app->request->get('id');

        $dataProvider = ProductInfo::find()->joinWith('category')->asArray()->where(['url' => $product_url])->one();

        if(!empty($dataProvider['id'])) {
            return $this->render('index',[ 'data' => $dataProvider ]);
        } else {
            throw new \yii\web\NotFoundHttpException('Page not Found');
        }
    }
}
