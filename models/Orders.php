<?php

namespace app\models;
use borales\extensions\phoneInput\PhoneInputValidator;
use borales\extensions\phoneInput\PhoneInputBehavior;
use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $fio
 * @property string $phone
 * @property string $delivery
 * @property string $payment_method
 * @property string $comment
 * @property string $total_price
 * @property string $items
 * @property integer $status
 * @property integer $user_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

	//public function afterFind() {
	//	var_dump($this); die();
	//
	//	parent::afterFind();
	//	//if(!empty($this->attribute_values)) {
	//	//	$this->attribute_values = json_decode($this->attribute_values, true);
	//	//}
	//
	//}
	public function afterFind() {
    	parent::afterFind();
    	if (!empty($this->total_price)) $this->total_price = json_decode($this->total_price);
		if (!empty($this->items)) $this->items = json_decode($this->items);
	}


	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'updated_at',
				'value' => new Expression('NOW()'),
			],
			'phoneInput' => PhoneInputBehavior::className(),
		];
	}


	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment', 'total_price', 'items'], 'string'],
            [['status', 'user_id'], 'integer'],
            [['fio'], 'string', 'max' => 30],
            ['fio', 'required', 'message' => 'Необхідно заповнити «{attribute}».'],

            [['phone'], 'string'],
            [['phone'], PhoneInputValidator::className(), 'message' => 'Невірний формат поля «{attribute}».'],
            ['phone', 'required', 'message'=>"Необхідно заповнити «{attribute}»"],
            //[['delivery', 'payment_method'], 'string', 'max' => 50],
            [['delivery'], 'string', 'max' => 50],
            [['delivery'], 'required', 'message'=> "Необхідно вибрати «{attribute}»"],

            [['created_at', 'updated_at'], 'date']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ПІБ',
            'phone' => 'Телефон',
            'delivery' => 'Метод доставки',
            'payment_method' => 'Метод оплати',
            'comment' => 'Коментар',
            'total_price' => 'Всього',
            'items' => 'Items',
            'status' => 'Статус',
            'user_id' => 'User ID',
        ];
    }



}
