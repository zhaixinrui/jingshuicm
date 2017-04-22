<?php

/**
 * This is the model class for table "Goods".
 *
 * The followings are the available columns in table 'Goods':
 * @property integer $id
 * @property integer $merchantId
 * @property string $name
 * @property string $introduction
 * @property double $price
 * @property double $promotionPrice
 * @property string $category
 * @property string $createTime
 */
class Goods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Goods the static model class
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
		return 'Goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merchantId, name, price', 'required'),
			array('merchantId', 'numerical', 'integerOnly'=>true),
			array('price, promotionPrice', 'numerical'),
			array('name', 'length', 'max'=>225),
			array('introduction', 'length', 'max'=>1024),
			array('category', 'length', 'max'=>255),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, merchantId, name, introduction, price, promotionPrice, category, createTime', 'safe', 'on'=>'search'),
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
			'orderGoods' => array(self::HAS_MANY, 'OrderGoods', 'goodsId'),
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
			'price' => 'Price',
			'promotionPrice' => 'Promotion Price',
			'category' => 'Category',
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

		$criteria->compare('merchantId',$this->merchantId);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('introduction',$this->introduction,true);

		$criteria->compare('price',$this->price);

		$criteria->compare('promotionPrice',$this->promotionPrice);

		$criteria->compare('category',$this->category,true);

		$criteria->compare('createTime',$this->createTime,true);

		return new CActiveDataProvider('Goods', array(
			'criteria'=>$criteria,
		));
	}
}