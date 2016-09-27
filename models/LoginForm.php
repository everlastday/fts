<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model {

	public $username;
	public $password;
	public $rememberMe;   // = true
	public $email;
	public $password_repeat;
	public $captcha;

	private $_user = false;


	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// username and password are both required
			[ [ 'username', 'password' ], 'required', 'message' => 'Необхідно заповнити «{attribute}».' ],
			// rememberMe must be a boolean value
			[ 'rememberMe', 'boolean' ],
			// password is validated by validatePassword()
			[ 'password', 'validatePassword' ],
		];
	}


	public function attributeLabels() {
		return [
			'username'        => 'Логін',
			'email'           => 'Email',
			'password'        => 'Пароль',
			'password_repeat' => 'Повторіть',
			'captcha'         => '',
			'name'            => 'Імя',
			'surname'         => 'Прізвище',
			'address'         => 'Адреса',
			'phone'           => 'Телефон',
		];
	}


	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validatePassword( $attribute, $params ) {
		if ( ! $this->hasErrors() ) {
			$user = $this->getUser();
			if ( ! $user || ! $user->validatePassword( $this->password ) ) {
				$this->addError( $attribute, 'Неправильне ім\'я користувача або пароль.' );
			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 * @return boolean whether the user is logged in successfully
	 */
	public function login() {
		if ( $this->rememberMe ) {
			$u = $this->getUser();

			if(!empty($u)) {
				$u->generateAuthKey();
				$u->save();
			}

		}
		if ( $this->validate() ) {
			return Yii::$app->user->login( $this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0 );
		}

		return false;
	}

	public function loginAdmin() {
		if ( $this->validate() && User::isUserAdmin( $this->username ) ) {
			if ( $this->rememberMe ) {
				$u = $this->getUser();

				if(!empty($u)) {
					$u->generateAuthKey();
					$u->save();
				}
			}

			return Yii::$app->user->login( $this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0 );
		} else {
			//return false;
			$this->addError( 'password', 'Неправильне ім\'я користувача або пароль.' );

			return false;
		}
	}


	/**
	 * Finds user by [[username]]
	 *
	 * @return User|null
	 */
	public function getUser() {
		if ( $this->_user === false ) {
			if ( strpos( $this->username, '@' ) !== false ) {
				$this->_user = User::findOne([ 'email' => $this->username,  'status' => User::STATUS_ACTIVE ] );
			} else {
				//Otherwise we search using the username
				$this->_user = User::findByUsername( $this->username );
			}
			//$this->_user = User::findByUsername( $this->username );
		}

		return $this->_user;
	}
}
