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
            'product_category_id' => 'Product Category ID',
            'attribute' => 'Attribute',
            'attribute_values' => 'Attribute Values',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategories::className(), ['id' => 'product_category_id']);
    }
}
