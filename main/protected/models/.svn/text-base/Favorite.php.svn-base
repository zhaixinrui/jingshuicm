<?php

/**
 * This is the model class for table "Favorite".
 *
 * The followings are the available columns in table 'Favorite':
 * @property integer $id
 * @property integer $userId
 * @property string $type
 * @property integer $foreignKey
 * @property string $createTime
 */
class Favorite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Favorite the static model class
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
		return 'Favorite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, type, foreignKey', 'required'),
			array('userId, foreignKey', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>32),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, type, foreignKey, createTime', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'foreignKey' => 'Foreign Key',
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

		$criteria->compare('userId',$this->userId);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('foreignKey',$this->foreignKey);

		$criteria->compare('createTime',$this->createTime,true);

		return new CActiveDataProvider('Favorite', array(
			'criteria'=>$criteria,
		));
	}
}