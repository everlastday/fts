<?php

namespace app\controllers;

use app\models\Gallery;
use app\models\ProductInfo;
use yii\web\Controller;
use app\models\Pages;

class PageController extends Controller
{

    public function actionIndex()
    {

        $page_url =  \Yii::$app->request->get('id');

        $dataProvider = Pages::find()->asArray()->where(['url' => $page_url])->one();

        if(!empty($dataProvider['id'])) {
            return $this->render('index',[ 'data' => $dataProvider ]);
        } else {
            throw new \yii\web\NotFoundHttpException('Page not Found');
        }
    }

    public function actionMain()
    {
		$images = Gallery::find()->joinWith('galleries', false, 'LEFT JOIN')
		                           ->select(['gallery.type', 'gallery.img', 'galleries.url', 'gallery.title'])
		                           ->where(['type' => [3,1]])->asArray()->all();

		$all_products = ProductInfo::find()->joinWith('category', false, 'LEFT JOIN')
		                               ->select(['product_info.id','product_info.url', 'product_info.product_image', 'product_categories.category_name' ])
		                               ->indexBy('id')
		                               ->asArray()
		                               ->all();


		if(count($all_products) > 4) {
			$rand_product_keys = array_rand($all_products, 4);

			$products = [
				$all_products[$rand_product_keys[0]],
				$all_products[$rand_product_keys[1]],
				$all_products[$rand_product_keys[2]],
				$all_products[$rand_product_keys[3]],
			];
		} else {
			$products = $all_products;
		}



		//var_dump($products); die();
		$slides = [];
		foreach ($images as $sort_key => $sort_image) {
			if($sort_image['type'] == 3) {
				$slides['slider'][$sort_key] = $sort_image;
			} elseif($sort_image['type'] == 1) {
				$slides['carousel'][$sort_key] = $sort_image;
			}
		}
        return $this->render('main', [
        	'slides' => $slides,
            'products' => $products,
        ]);
    }


    public function actionColor($id) {

    	if($id == 1) {
    		return $this->render('catalog');
	    } elseif($id == 2) {
    		return $this->render('products');
	    } else {
    		echo $id . 'test';
	    }

    }


    //public function actionAbout()
    //{
    //    return $this->render('about');
    //}
    //
    //
    //public function actionContacts()
    //{
    //    return $this->render('contacts');
    //}
    //
    //public function actionProductCardAkryl()
    //{
    //    return $this->render('product-card-akryl');
    //}
    //
    //public function actionProductCardSilicone()
    //{
    //    return $this->render('product-card-silicone');
    //}
    //
    //public function actionProductCardMarmure()
    //{
    //    return $this->render('product-card-marmure');
    //}
    //
    //public function actionProductCardDecor()
    //{
    //    return $this->render('product-card-decor');
    //}
    //
    //public function actionProductCardQuartzlineAcryl()
    //{
    //    return $this->render('product-card-quartzline-acryl');
    //}
    //public function actionProductCardQuartzlineSilicone()
    //{
    //    return $this->render('product-card-quartzline-silicone');
    //}
    //public function actionProductCardGruntGlybokyi()
    //{
    //    return $this->render('product-card-grunt-glybokyi');
    //}
    //public function actionProductCardFacadeAcryl()
    //{
    //    return $this->render('product-card-facade-acryl');
    //}
    //public function actionProductCardFacadeSilicone()
    //{
    //    return $this->render('product-card-facade-silicone');
    //}
    //public function actionProductCardZaglushka()
    //{
    //    return $this->render('product-card-zaglushka');
    //}
    //
    //public function actionGalleryDecor()
    //{
    //    return $this->render('gallery-decor');
    //}
    //public function actionGalleryMarmure()
    //{
    //    return $this->render('gallery-marmure');
    //}
    //
    //public function actionGalleryAkryll()
    //{
    //    return $this->render('gallery-akryll');
    //}
    //
    //public function actionGallery()
    //{
    //    return $this->render('gallery');
    //}


}
