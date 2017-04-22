<?php

/**
 * This is the model class for table "Apply".
 *
 * The followings are the available columns in table 'Apply':
 * @property integer $id
 * @property integer $userId
 * @property string $content
 * @property string $email
 * @property string $phone
 * @property integer $status
 * @property string $createTime
 * @property string $updateTime
 */
class Apply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Apply the static model class
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
		return 'Apply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, content, phone', 'required'),
			array('userId, status', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>1024),
			array('email, phone', 'length', 'max'=>255),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, content, email, phone, status, createTime, updateTime', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'userId' => 'User',
			'content' => 'Content',
			'email' => 'Email',
			'phone' => 'Phone',
			'status' => 'Status',
			'createTime' => 'Create Time',
			'updateTime' => 'Update Time',
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

		$criteria->compare('userId',$this->userId);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('createTime',$this->createTime,true);

		$criteria->compare('updateTime',$this->updateTime,true);

		return new CActiveDataProvider('Apply', array(
			'criteria'=>$criteria,
		));
	}
}