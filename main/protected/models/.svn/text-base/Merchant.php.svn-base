<?php

/**
 * This is the model class for table "Merchant".
 *
 * The followings are the available columns in table 'Merchant':
 * @property integer $id
 * @property integer $userId
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $coordinate
 * @property string $introduction
 * @property string $logo
 * @property string $category
 * @property integer $level
 * @property integer $promotionExpenses
 */
class Merchant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Merchant the static model class
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
		return 'Merchant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, name', 'required'),
			array('userId, level, promotionExpenses', 'numerical', 'integerOnly'=>true),
			array('name, address, introduction, logo', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>45),
			array('coordinate', 'length', 'max'=>128),
			array('category', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, name, phone, address, coordinate, introduction, logo, category, level, promotionExpenses', 'safe', 'on'=>'search'),
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
			'activities' => array(self::HAS_MANY, 'Activity', 'merchantId'),
			'goods' => array(self::HAS_MANY, 'Goods', 'merchantId'),
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
			'name' => 'Name',
			'phone' => 'Phone',
			'address' => 'Address',
			'coordinate' => 'Coordinate',
			'introduction' => 'Introduction',
			'logo' => 'Logo',
			'category' => 'Category',
			'level' => 'Level',
			'promotionExpenses' => 'Promotion Expenses',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('coordinate',$this->coordinate,true);

		$criteria->compare('introduction',$this->introduction,true);

		$criteria->compare('logo',$this->logo,true);

		$criteria->compare('category',$this->category,true);

		$criteria->compare('level',$this->level);

		$criteria->compare('promotionExpenses',$this->promotionExpenses);

		return new CActiveDataProvider('Merchant', array(
			'criteria'=>$criteria,
		));
	}
}