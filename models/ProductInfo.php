<?php
namespace app\models;

use Imagine\Image\ManipulatorInterface;
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
class ProductInfo extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public $file;


	public static function tableName() {
		return 'product_info';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[ [ 'params', 'info', 'measure' ], 'string' ],
			[ [ 'category_id', 'gallery_id' ], 'integer' ],
			[ [ 'url', 'name', 'product_image' ], 'string', 'max' => 255 ],
			[ [ 'url' ], 'unique' ],
			[ [ 'file' ], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg' ],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'            => 'ID',
			'url'           => 'Ссилка',
			'name'          => 'Назва',
			'product_image' => 'Зображення',
			'params'        => 'Params',
			'info'          => 'Info',
			'category_id'   => 'Категорія',
			'gallery_id'    => 'Галерея',
			'measure'       => 'Маса',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCategory() {
		return $this->hasOne( ProductCategories::className(), [ 'id' => 'category_id' ] );
	}

	public function upload() {
		if ( $this->validate() ) {
			if ( ! empty( $this->file ) ) {
				$path_to_frontend = Yii::getAlias( '@webroot/uploads/product_info_images/' );

				if(!empty($this->product_image)) {
					$this->deleteAllImages($this->product_image, $path_to_frontend);
				}

				$filename = $this->createFileName($this->file->baseName, $this->file->extension, $path_to_frontend);
				$original_image_file = $path_to_frontend . $filename . '.' . $this->file->extension;

				$this->file->saveAs( $original_image_file );

				if($this->file->extension == 'png') {
					$png_image = $original_image_file;
					$jpg_image = $path_to_frontend . $filename . '.jpg';

					$this->convertFromPng($png_image, $jpg_image, 95);

					$img = Image::getImagine()->open( $png_image );
					$size  = $img->getSize();
					$ratio = $size->getWidth() / $size->getHeight();
					$width = 150;
					$height = round( $width / $ratio );

					Image::thumbnail($png_image, $width, $height)
					     ->save($path_to_frontend . 'x' . $width . '_' . $filename . '.' .$this->file->extension);

				} else {
					$jpg_image = $original_image_file;
				}

				$img = Image::getImagine()->open( $jpg_image );
				$size  = $img->getSize();
				$ratio = $size->getWidth() / $size->getHeight();

				$width = 500;
				$height = round( $width / $ratio );
				Image::thumbnail($jpg_image, $width, $height)
				     ->save($path_to_frontend . 'x' . $width . '_' . $filename . '.jpg');

				$width = 300;
				$height = round( $width / $ratio );
				Image::thumbnail($jpg_image, $width, $height)
				     ->save($path_to_frontend . 'x' . $width . '_' . $filename . '.jpg');


				$width = 150;
				$height = round( $width / $ratio );
				Image::thumbnail($jpg_image, $width, $height)
				     ->save($path_to_frontend . 'x' . $width . '_' . $filename . '.jpg');

				$width = 65;
				$height = round( $width / $ratio );
				Image::thumbnail($jpg_image, $width, $height)
				     ->save($path_to_frontend . 'x' . $width . '_' . $filename . '.jpg');

				$this->product_image = $filename . '.jpg';
			}

			return true;
		} else {
			return false;
		}
	}

	public function convertImage( $originalImage, $outputImage, $quality ) {
		// jpg, png, gif or bmp?
		$exploded = explode( '.', $originalImage );
		$ext      = $exploded[ count( $exploded ) - 1 ];
		if ( preg_match( '/jpg|jpeg/i', $ext ) ) {
			$imageTmp = imagecreatefromjpeg( $originalImage );
		} else if ( preg_match( '/png/i', $ext ) ) {
			$imageTmp = imagecreatefrompng( $originalImage );
		} else if ( preg_match( '/gif/i', $ext ) ) {
			$imageTmp = imagecreatefromgif( $originalImage );
		} else if ( preg_match( '/bmp/i', $ext ) ) {
			$imageTmp = imagecreatefrombmp( $originalImage );
		} else {
			return 0;
		}
		// quality is a value from 0 (worst) to 100 (best)
		imagejpeg( $imageTmp, $outputImage, $quality );
		imagedestroy( $imageTmp );

		return 1;
	}

	public function convertFromPng( $originalImage, $outputImage, $quality = 100 ) {
		$file = $originalImage;
		$image = imagecreatefrompng( $file );
		$bg    = imagecreatetruecolor( imagesx( $image ), imagesy( $image ) );
		imagefill( $bg, 0, 0, imagecolorallocate( $bg, 255, 255, 255 ) );
		imagealphablending( $bg, true );
		imagecopy( $bg, $image, 0, 0, 0, 0, imagesx( $image ), imagesy( $image ) );
		imagedestroy( $image );
		header( 'Content-Type: image/jpeg' );
		//$quality = 50;
		imagejpeg( $bg, $outputImage, $quality );
		imagedestroy( $bg );
	}

	public function createFileName( $baseFileName, $fileExtension, $fileDirectory ) {
		$filename_original = trim( str_replace( ' ', '', $baseFileName ) );
		if ( preg_match( '/^[a-z-A-Z0-9-_]*$/', $filename_original ) ) {
			$filename = $filename_original;
			$cnt      = 1;
			while ( file_exists( $fileDirectory . $filename . '.' . $fileExtension ) ) {
				$filename = $filename_original . '_' . $cnt;
				$cnt ++;
			}
		} else {
			$filename = date( 'ymdHis' );
		}

		return $filename;
	}

	public function deleteAllImages($image, $path) {


			$point_position = strrpos($image, '.', -1);
			$fileNameWithoutExtension = substr($image, 0, $point_position);

			$imageFiles = [
				'jpg' => $image,
				'png' => $fileNameWithoutExtension . '.png'
			];

			$thumbs_sizes = [65, 150, 300, 500];

			foreach ($imageFiles as $imageFile) {
				if ( file_exists( $path . $imageFile ) ) {
					unlink( $path . $imageFile );
				}
				foreach ($thumbs_sizes as $thumb_size) {
					if ( file_exists( $path . 'x' . $thumb_size . '_' . $imageFile ) ) {
						unlink( $path . 'x' . $thumb_size . '_' . $imageFile );
					}
				}
			}


	}



}
