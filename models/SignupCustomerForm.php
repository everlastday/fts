<?php

namespace app\models;
use yii\base\Model;
use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;
use borales\extensions\phoneInput\PhoneInputBehavior;

class SignupCustomerForm extends Model
{
	public $username;
	public $email;
	public $password;
	public $password_repeat;
	public $captcha;
	public $name;
	public $surname;
	public $address;
	public $phone;
	/**
	 * @inheritdoc
	 */

	public function behaviors()
	{
		return [
			'phoneInput' => PhoneInputBehavior::className(),
		];
	}


	public function rules()
	{
		return [
			['username', 'filter', 'filter' => 'trim'],
			['username', 'required', 'message' => 'Необхідно заповнити «{attribute}».'],
			['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Цей логін уже використовується.'],
			['username', 'string', 'message' => 'test', 'min' => 2, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],

			['name', 'string', 'min' => 3, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],
			['name', 'filter', 'filter' => 'trim'],
			['name', 'required', 'message'=>"Необхідно заповнити «{attribute}»"],

			//['phone', 'integer', 'min' => 3, 'max' => 255],
			//['phone', 'filter', 'filter' => 'trim'],

			[['phone'], 'string'],
			[['phone'], PhoneInputValidator::className(), 'message' => 'Невірний формат поля «{attribute}».'],
			['phone', 'required', 'message'=>"Необхідно заповнити «{attribute}»"],

			['surname', 'string', 'min' => 3, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],
			['surname', 'filter', 'filter' => 'trim'],

			['address', 'string', 'min' => 3, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],
			['address', 'filter', 'filter' => 'trim'],

			['email', 'filter', 'filter' => 'trim'],
			['email', 'required', 'message'=>"Необхідно заповнити «{attribute}»"],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Ця електронна адреса уже використовується.'],

			['password', 'required', 'message' => 'Пароль обов\'язковий для заповнення'],
			['password', 'string', 'min' => 6],
			['password_repeat', 'required', 'message' => 'Необхідно повторити пароль'],
			['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Паролі не збігаються" ],

			['captcha', 'required'],
			//['captcha', 'captcha', 'captchaAction'=>'/customer/customer/captcha'],


		];
	}

	public function attributeLabels()
	{
		return [
			'username' => 'Логін',
			'email' => 'Email',
			'password' => 'Пароль',
			'password_repeat' => 'Повторіть',
			'captcha' => '',
			'name' => 'Імя',
			'surname' => 'Прізвище',
			'address' => 'Адреса',
			'phone' => 'Телефон',
        ];
	}
	
	

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup()
	{
		if (!$this->validate()) {
			//var_dump($this->errors);
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->phone = $this->phone;
		$user->address = $this->address;
		$user->name = $this->name;
		$user->surname = $this->surname;


		$user->setPassword($this->password);
		$user->generateAuthKey();

		return $user->save() ? $user : null;
	}


}