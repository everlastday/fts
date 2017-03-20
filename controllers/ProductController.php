<?php
namespace app\controllers;

use app\models\Galleries;
use app\models\ProductInfo;

class ProductController extends \yii\web\Controller {

	public function actionIndex() {
		$product_url  = \Yii::$app->request->get( 'id' );
		$dataProvider = ProductInfo::find()->joinWith( 'category' )->asArray()->where( [ 'url' => $product_url ] )->one();
		if ( ! empty( $dataProvider[ 'gallery_id' ] ) ) {
			$gallery = Galleries::find()->where( [ 'id' => $dataProvider[ 'gallery_id' ] ] )->one();
		} else {
			$gallery = null;
		}
		if ( ! empty( $dataProvider[ 'id' ] ) ) {
			return $this->render( 'index', [
				'data'    => $dataProvider,
				'gallery' => $gallery
			] );
		} else {
			throw new \yii\web\NotFoundHttpException( 'Сторінка не знайдена' );
		}
	}

	public function actionBuy( $id ) {
		$data       = ProductInfo::find()->joinWith( 'category' )->asArray()->where( [ 'url' => $id ] )->one();
		$colors     = \app\models\Gallery::find()->joinWith( 'galleries' )->where( [ 'galleries_id' => $data[ 'gallery_id' ] ] )->all();
		$attributes = \app\models\ProductAttributes::find()->where( [ 'product_category_id' => $data[ 'category_id' ] ] )->all();
		$groups     = \app\models\ProductGroups::find()->where( [ 'product_category_id' => $data[ 'category_id' ] ] )->with( 'productInfo' )->groupBy( [ 'type' ] )->asArray()->all();

		//var_dump($dataProvider); die();
		return $this->render( 'catalog', [
			'data'       => $data,
			'colors'     => $colors,
			'attributes' => $attributes,
			'groups'     => $groups,
		] );
		//var_dump($id); die();
	}


}
