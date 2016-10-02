<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Gallery;

class GalleryController extends Controller
{
    public function actionIndex()
    {
        $gallery_items = Gallery::find()->asArray()->all();

        return $this->render('index', [
            'gallery_images' => $gallery_items,
        ]);
    }
}
