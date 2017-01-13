<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * This is the model class for table "product_info".
 *
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property string $product_image
 * @property string $params
 * @property string $info
 * @property integer $category_id
 *
 * @property ProductCategories $category
 */
class ProductInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;


    public static function tableName()
    {
        return 'product_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['params', 'info', 'measure'], 'string'],
            [['category_id', 'gallery_id'], 'integer'],
            [['url', 'name', 'product_image'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Ссилка',
            'name' => 'Назва',
            'product_image' => 'Зображення',
            'params' => 'Params',
            'info' => 'Info',
            'category_id' => 'Категорія',
            'gallery_id' => 'Галерея',
            'measure' => 'Маса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategories::className(), ['id' => 'category_id']);
    }

    public function upload()
    {

        if ($this->validate()) {

            if(!empty($this->file)) {

                $path_to_frontend = Yii::getAlias('@webroot/uploads/product_info_images/');  //realpath(Yii::$app->basePath) . '/uploads/product_info_images/';

                if(isset($this->url) and ! empty($this->url)) {
                    $filename =  date('ymdHis'). '_' . $this->url . '.' . $this->file->extension;
                } else {
                    $filename =  date('ymdHis'). '_' . $this->file->baseName . '.' . $this->file->extension;
                }



                $this->file->saveAs($path_to_frontend . $filename);

                if(isset($this->product_image) and !empty($this->product_image)) {

                    $image = $path_to_frontend . $this->product_image;
                    $image_small = $path_to_frontend . 'small_' . $this->product_image;

                    if(file_exists($image)) unlink($image);
                    if(file_exists($image_small)) unlink($image_small);

                }

                $this->product_image = $filename;

                $img = Image::getImagine()->open($path_to_frontend . $filename);

                $size = $img->getSize();
                $ratio = $size->getWidth()/$size->getHeight();


                $width = 65;
                $height = round($width/$ratio);

                $width_original = 500;
                $height_original = round($width_original/$ratio);

                Image::thumbnail($path_to_frontend . $filename, $width_original, $height_original)
                     ->save($path_to_frontend  . $filename);

                Image::thumbnail($path_to_frontend . $filename, $width, $height)
                             ->save($path_to_frontend .  'small_' . $filename);
            }
            return true;
        } else {
            return false;
        }
    }

}
