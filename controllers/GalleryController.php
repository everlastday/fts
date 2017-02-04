<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Gallery;
use app\models\Galleries;

class GalleryController extends Controller {

	public function actionIndex( $id ) {
		//var_dump($id); die();
		$gallery_items = null;
		$gallery_url   = '';
		$gallery       = Galleries::find()->where( [ 'url' => $id ] )->asArray()->one();
		if ( ! empty( $gallery ) and isset( $gallery[ 'id' ] ) ) {
			$gallery_items = Gallery::find()->where( [ 'galleries_id' => $gallery[ 'id' ] ] )->asArray()->all();
			$gallery_url   = $gallery[ 'url' ];

			$template = ($gallery['gallery_type'] == 2) ? 'index_fliplightbox' : 'index';

			return $this->render( $template, [
				'gallery_images' => $gallery_items,
				'gallery_url'    => $gallery_url,
				'gallery'        => $gallery
			] );
		}
		else {
				throw new \yii\web\NotFoundHttpException('Такої галереї не існує');
		}
	}
}
