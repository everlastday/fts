<?php

namespace app\models;
use borales\extensions\phoneInput\PhoneInputValidator;


class SignupForm extends User
{
	public $username;
	public $email;
	public $password;
	public $name;
	public $surname;
	public $address;
	public $phone;
	public $role;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['username', 'filter', 'filter' => 'trim'],
			['username', 'required', 'message' => 'Необхідно заповнити «{attribute}».'],
			['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Цей логін уже використовується.'],
			['username', 'string', 'message' => 'test', 'min' => 2, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],

			['name', 'string', 'min' => 3, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],
			['name', 'filter', 'filter' => 'trim'],

			[['phone'], 'string'],
			[['phone'], PhoneInputValidator::className(), 'message' => 'Невірний формат поля «{attribute}».'],


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

			['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],

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
			var_dump($this->errors);
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();

		$user->phone = $this->phone;
		$user->address = $this->address;
		$user->name = $this->name;
		$user->surname = $this->surname;
		$user->role = $this->role;



		return $user->save() ? $user : null;
	}


}