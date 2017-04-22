<?php

/**
 * This is the model class for table "JoinActivity".
 *
 * The followings are the available columns in table 'JoinActivity':
 * @property integer $id
 * @property integer $activityId
 * @property integer $userId
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property integer $houseArea
 * @property string $status
 * @property string $createTime
 */
class JoinActivity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JoinActivity the static model class
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
		return 'JoinActivity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activityId, userId, name, phone', 'required'),
			array('activityId, userId, houseArea', 'numerical', 'integerOnly'=>true),
			array('name, address, status', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>45),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, activityId, userId, name, phone, address, houseArea, status, createTime', 'safe', 'on'=>'search'),
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
			'activity' => array(self::BELONGS_TO, 'Activity', 'activityId'),
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
			'activityId' => 'Activity',
			'userId' => 'User',
			'name' => 'Name',
			'phone' => 'Phone',
			'address' => 'Address',
			'houseArea' => 'House Area',
			'status' => 'Status',
			'createTime' => 'Create Time',
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

		$criteria->compare('activityId',$this->activityId);

		$criteria->compare('userId',$this->userId);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('houseArea',$this->houseArea);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('createTime',$this->createTime,true);

		return new CActiveDataProvider('JoinActivity', array(
			'criteria'=>$criteria,
		));
	}
}