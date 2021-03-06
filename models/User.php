<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;


	const ROLE_USER = 1;
	const ROLE_ADMIN = 10;

	public $new_password;
	public $password_repeat;


	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%user}}';
	}


	public function test() {
		echo $this->scenario; die();
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}


	public function scenarios()
	{
		return [
			'client' => ['username', 'name', 'new_password', 'phone', 'email', 'address', 'surname', 'password_repeat'  ],
			'default' => ['username', 'name', 'new_password', 'phone', 'email', 'address', 'surname', 'status', 'role', ],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['username', 'email', 'address', 'name', 'surname'], 'string'],
			['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Цей логін уже використовується.'],
			['username', 'string', 'message' => 'test', 'min' => 2, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],

			['name', 'string', 'min' => 3, 'max' => 255, 'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символи.'],
			['name', 'filter', 'filter' => 'trim'],

			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
			['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],

			['new_password', 'string', 'min' => 6,'tooShort' => 'Поле «{attribute}» має містити мінімум {min} символів.', 'on' => 'client'],

			['new_password', 'custom_function_validation', 'on' => 'client'],
			['password_repeat', 'compare', 'compareAttribute'=>'new_password', 'message'=>"Паролі не збігаються", 'on' => 'client' ],

			//['password', 'required', 'message' => 'Пароль обов\'язковий для заповнення'],
			//['password', 'string', 'min' => 6],

			['email', 'filter', 'filter' => 'trim'],
			['email', 'email', 'message'=>"Необхідно заповнити «{attribute}»"],
			['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Ця електронна адреса уже використовується.'],

			[['phone'], 'string'],
			[['phone'], PhoneInputValidator::className(), 'message' => 'Невірний формат поля «{attribute}».'],


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
		    'new_password' => 'Новий пароль',
		];
	}



	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}

		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 * @return boolean
	 */
	public static function isPasswordResetTokenValid($token)
	{
		if (empty($token)) {
			return false;
		}

		$timestamp = (int) substr($token, strrpos($token, '_') + 1);
		$expire = Yii::$app->params['user.passwordResetTokenExpire'];
		return $timestamp + $expire >= time();
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}

	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}

	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey()
	{
		$this->auth_key = Yii::$app->security->generateRandomString();
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}

	public static function isUserAdmin($username)
	{
		if (static::findOne(['username' => $username, 'role' => self::ROLE_ADMIN]))
		{
			return true;
		} else {
			return false;
		}
	}

	public function custom_function_validation($attribute, $params) {

		if(!empty($this->new_password) and empty($this->password_repeat)) {
			$this->addError( 'password_repeat', 'Необхідно повторити пароль');
			return false;
		} else {
			return true;
		}
	}
}





//
//namespace app\models;
//use yii\db\ActiveRecord;
//use yii\web\IdentityInterface;
//
//
//class User extends ActiveRecord implements IdentityInterface
//{
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
//
//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];
//
//
//    /**
//     * @inheritdoc
//     */
//    public static function findIdentity($id)
//    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public static function findIdentityByAccessToken($token, $type = null)
//    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
//    }
//
//    /**
//     * Finds user by username
//     *
//     * @param string $username
//     * @return static|null
//     */
//    public static function findByUsername($username)
//    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function getAuthKey()
//    {
//        return $this->authKey;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function validateAuthKey($authKey)
//    {
//        return $this->authKey === $authKey;
//    }
//
//    /**
//     * Validates password
//     *
//     * @param string $password password to validate
//     * @return boolean if password provided is valid for current user
//     */
//    public function validatePassword($password)
//    {
//        return $this->password === $password;
//    }
//}
