<?php

namespace app\controllers;
use app\models\Gallery;
use yii\web\Controller;

use app\models\ProductGroups;
use Yii;

class AjaxController extends Controller
{
	public function actionIndex() {}


	public function actionPrice() {

		if (Yii::$app->request->isAjax) {
			$color = '';
			$group = '';
			$measure = '';
			$price = 0;


			$data = Yii::$app->request->post();

			if(isset($data['color']) and !empty($data['color']))
			{
				$color = Gallery::find()->where(['id' => $data['color']])->one();

				if(isset($color->options[$data['current_category_id']]) ) {
					$group = $color->options[$data['current_category_id']];
				}

			}

			if(isset($data['measure']) and !empty($data['measure'])) {
				$measure = explode(' ', $data['measure']);
				$measure = $measure[0];
			}


			if(!empty($group) and !empty($measure)) {
				$price = ProductGroups::find()->where(['group' => $group, 'type' => $measure, 'product_category_id' => $data['current_category_id']])->one();
			}
			elseif(!empty($measure)) {
				$price = ProductGroups::find()->where(['type' => $measure, 'product_category_id' => $data['current_category_id']])->one();
			}
			else {
				$price = ProductGroups::find()->where(['product_category_id' => $data['current_category_id']])->one();
			}


			if(empty($price)) {
				$price = 0;
			}
			//$searchname= explode(":", $data['searchname']);
			//$searchby= explode(":", $data['searchby']);
			//$searchname= $searchname[0];
			//$searchby= $searchby[0];
			//$search = // your logic;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return [
				$price,
				//'search' => $data,
				//'code' => 100,
			    //'color' => $color,
			    //'group' => $group,
			    //'measure' => $measure,
			    //'result' => $result
			];
		}
	}


}