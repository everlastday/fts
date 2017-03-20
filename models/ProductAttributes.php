<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_attributes".
 *
 * @property integer $id
 * @property integer $product_category_id
 * @property string $attribute
 * @property string $attribute_values
 *
 * @property ProductCategories $productCategory
 */
class ProductAttributes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id'], 'integer'],
            [['attribute', 'attribute_values'], 'string', 'max' => 255],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::className(), 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_category_id' => 'Категорія',
            'attribute' => 'Атрибут',
            'attribute_values' => 'Значення',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategories::className(), ['id' => 'product_category_id']);
    }

	public function afterFind() {
		parent::afterFind();
		//var_dump($this); die();
		if(!empty($this->attribute_values)) {
			$this->attribute_values = json_decode($this->attribute_values, true);
		}

	}

	public function beforeValidate() {

		if(parent::beforeValidate()) {

			if(isset($this->attribute_values)) {
				$this->attribute_values = json_encode($this->attribute_values);
			}

			return true;
		} else {
			return false;
		}
	}



}
