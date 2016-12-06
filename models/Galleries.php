<?php
namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "galleries".
 *
 * @property integer $id
 * @property string $gallery_name
 * @property integer $gallery_type
 * @property string $gallery_categories
 * @property string $url
 */
class Galleries extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */

	public static function tableName() {
		return 'galleries';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[ [ 'gallery_type' ], 'integer' ],
			[ [ 'gallery_name', 'gallery_categories' ], 'string', 'max' => 255 ],
			[ [ 'url' ], 'string', 'max' => 50 ],
			[ 'url', 'filter', 'filter' => 'trim' ],
			[ 'url', 'required', 'message' => 'Необхідно заповнити «{attribute}».' ],
			[
				'url',
				'unique',
				'targetClass' => 'app\models\Galleries',
				'message'     => 'Цей адрес для галереї уже занятий.'
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'                 => 'ID',
			'gallery_name'       => 'Назва галереї',
			'gallery_type'       => 'Тип галереї',
			'gallery_categories' => 'Категорії',
			'url'                => 'Url галереї'
		];
	}

	//public function beforeSave($insert)
	//{
	//	var_dump($this);
	//
	//	die();
	//
	//	$gallery_categories = implode(",", $this->gallery_categories);
	//	$this->gallery_categories = $gallery_categories;
	//	return parent::beforeSave($insert);
	//}
	public function afterFind() {
		parent::afterFind();
		if ( ! empty( $this->gallery_categories ) ) {
			$this->gallery_categories = explode( ',', $this->gallery_categories );
			$this->gallery_categories = ProductCategories::find()->where( [
				'in',
				'id',
				$this->gallery_categories
			] )->asArray()->all();
		}
	}

	public function beforeValidate() {
		if ( ! empty( $this->gallery_categories and is_array( $this->gallery_categories ) ) ) {
			$this->gallery_categories = implode( ",", $this->gallery_categories );
		}

		return parent::beforeValidate();
	}

	public static function showCategories( $categories_id = array() ) {
		if ( ! empty( $categories_id and is_array( $categories_id ) ) ) {
			//$categories = ProductCategories::find()->asArray()->all();
			//$categories = ArrayHelper::index( $categories, 'id' );
			$data = '<ul style="list-style: none">';


			//var_dump($categories_id); die();

			foreach ( $categories_id as $category ) {
				if ( ! empty( $category[ 'category_name' ] ) ) {
					$data .= "<li>" . $category[ 'category_name' ] . '</li>';
				}
			}
			$data .= '</ul>';

			return $data;
		}

		return null;
	}

	public function getProductCategory() {
		return $this->hasOne( ProductCategories::className(), [ 'id' => 'gallery_categories' ] );
	}


}
