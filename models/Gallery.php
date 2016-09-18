<?php

namespace app\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $img
 */
class Gallery extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['title', 'img'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'img' => 'Img',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {

            if(!empty($this->file)) {

                $path_to_frontend = '../..' . \Yii::$app->urlManagerFrontend->createUrl('/') . 'uploads/gallerys/';

                $filename =  date('ymdHis'). '_' . $this->file->baseName . '.' . $this->file->extension;

                $this->file->saveAs($path_to_frontend . $filename);

                if(isset($this->img) and !empty($this->img)) {

                    $image = $path_to_frontend . $this->img;
                    $image_small = $path_to_frontend . 'small_' . $this->img;

                    if(file_exists($image)) unlink($image);
                    if(file_exists($image_small)) unlink($image_small);

                }

                $this->img = $filename;

                $img = Image::getImagine()->open($path_to_frontend . $filename);

                $size = $img->getSize();
                $ratio = $size->getWidth()/$size->getHeight();

                $width = 170;
                $height = round($width/$ratio);

                if($size->getWidth() > 800) {
                    $width_original = 800;
                    $height_original = round($width_original/$ratio);

                    Image::thumbnail($path_to_frontend . $filename, $width_original, $height_original)
                         ->save($path_to_frontend  . $filename);
                } else {
                    Image::thumbnail($path_to_frontend . $filename, $size->getWidth(), $size->getHeight())
                         ->save($path_to_frontend  . $filename);
                }


                Image::thumbnail($path_to_frontend . $filename, $width, $height)
                     ->save($path_to_frontend .  'small_' . $filename);
            }
            return true;
        } else {
            return false;
        }
    }

}
