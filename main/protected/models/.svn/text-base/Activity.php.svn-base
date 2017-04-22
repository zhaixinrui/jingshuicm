<?php

/**
 * This is the model class for table "Activity".
 *
 * The followings are the available columns in table 'Activity':
 * @property integer $id
 * @property integer $merchantId
 * @property string $name
 * @property string $introduction
 * @property string $address
 * @property string $period
 * @property string $phone
 * @property string $createTime
 * @property integer $promotionExpenses
 * @property string $category
 */
class Activity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Activity the static model class
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
		return 'Activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merchantId, name', 'required'),
			array('merchantId, promotionExpenses', 'numerical', 'integerOnly'=>true),
			array('name, address, period', 'length', 'max'=>225),
			array('introduction', 'length', 'max'=>1024),
			array('phone', 'length', 'max'=>45),
			array('category', 'length', 'max'=>255),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, merchantId, name, introduction, address, period, phone, createTime, promotionExpenses, category', 'safe', 'on'=>'search'),
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
			'merchant' => array(self::BELONGS_TO, 'Merchant', 'merchantId'),
			'joinActivities' => array(self::HAS_MANY, 'JoinActivity', 'activityId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'merchantId' => 'Merchant',
			'name' => 'Name',
			'introduction' => 'Introduction',
			'address' => 'Address',
			'period' => 'Period',
			'phone' => 'Phone',
			'createTime' => 'Create Time',
			'promotionExpenses' => 'Promotion Expenses',
			'category' => 'Category',
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

		$criteria->compare('merchantId',$this->merchantId);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('introduction',$this->introduction,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('period',$this->period,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('createTime',$this->createTime,true);

		$criteria->compare('promotionExpenses',$this->promotionExpenses);

		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider('Activity', array(
			'criteria'=>$criteria,
		));
	}
}