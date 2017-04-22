<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $id
 * @property string $username
 * @property string $nickname
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property integer $role
 * @property integer $status
 * @property string $createTime
 * @property string $updateTime
 * @property string $lastLoginTime
 * @property string $token
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('role, status', 'numerical', 'integerOnly'=>true),
			array('username, nickname, password, email, phone, token', 'length', 'max'=>255),
			array('createTime, updateTime, lastLoginTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, nickname, password, email, phone, role, status, createTime, updateTime, lastLoginTime, token', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'applies' => array(self::HAS_MANY, 'Apply', 'userId'),
			'comments' => array(self::HAS_MANY, 'Comment', 'userId'),
			'favorites' => array(self::HAS_MANY, 'Favorite', 'userId'),
			'joinActivities' => array(self::HAS_MANY, 'JoinActivity', 'userId'),
			'merchants' => array(self::HAS_MANY, 'Merchant', 'userId'),
			'orderGoods' => array(self::HAS_MANY, 'OrderGoods', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => 'Username',
			'nickname' => 'Nickname',
			'password' => 'Password',
			'email' => 'Email',
			'phone' => 'Phone',
			'role' => 'Role',
			'status' => 'Status',
			'createTime' => 'Create Time',
			'updateTime' => 'Update Time',
			'lastLoginTime' => 'Last Login Time',
			'token' => 'Token',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('username',$this->username,true);

		$criteria->compare('nickname',$this->nickname,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('role',$this->role);

		$criteria->compare('status',$this->status);

		$criteria->compare('createTime',$this->createTime,true);

		$criteria->compare('updateTime',$this->updateTime,true);

		$criteria->compare('lastLoginTime',$this->lastLoginTime,true);

		$criteria->compare('token',$this->token,true);

		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		//return crypt($password,$this->password)===$this->password;
        return $this->hashPassword($password) === $this->password; 
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		//return crypt($password, $this->generateSalt());
        return md5($password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 *
	 * The {@link http://php.net/manual/en/function.crypt.php PHP `crypt()` built-in function}
	 * requires, for the Blowfish hash algorithm, a salt string in a specific format:
	 *  - "$2a$"
	 *  - a two digit cost parameter
	 *  - "$"
	 *  - 22 characters from the alphabet "./0-9A-Za-z".
	 *
	 * @param int cost parameter for Blowfish hash algorithm
	 * @return string the salt
	 */
	protected function generateSalt($cost=10)
	{
		if(!is_numeric($cost)||$cost<4||$cost>31){
			throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
		}
		// Get some pseudo-random data from mt_rand().
		$rand='';
		for($i=0;$i<8;++$i)
			$rand.=pack('S',mt_rand(0,0xffff));
		// Add the microtime for a little more entropy.
		$rand.=microtime();
		// Mix the bits cryptographically.
		$rand=sha1($rand,true);
		// Form the prefix that specifies hash algorithm type and cost parameter.
		$salt='$2a$'.str_pad((int)$cost,2,'0',STR_PAD_RIGHT).'$';
		// Append the random salt string in the required base64 format.
		$salt.=strtr(substr(base64_encode($rand),0,22),array('+'=>'.'));
		return $salt;
	}
}
