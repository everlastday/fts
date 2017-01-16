<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_groups".
 *
 * @property integer $id
 * @property integer $group
 * @property integer $product_category_id
 * @property decimal $type
 * @property string $price
 *
 * @property ProductCategories $productCategory
 */
class ProductGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group', 'product_category_id'], 'integer'],
            [['type'], 'number'],
            [['price'], 'string', 'max' => 255],
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
            'group' => 'Група',
            'product_category_id' => 'Категорія',
            'type' => 'Маса/об\'єм',
            'price' => 'Ціна',
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
