<?php

/**
 * This is the model class for table "Comment".
 *
 * The followings are the available columns in table 'Comment':
 * @property integer $id
 * @property integer $userId
 * @property integer $merchantId
 * @property string $type
 * @property integer $foreignKey
 * @property string $comment
 * @property integer $status
 * @property string $createTime
 * @property string $updateTime
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'Comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, merchantId, type, foreignKey, comment', 'required'),
			array('userId, merchantId, foreignKey, status', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>32),
			array('comment', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, merchantId, type, foreignKey, comment, status, createTime, updateTime', 'safe', 'on'=>'search'),
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
			'merchantId' => 'Merchant',
			'type' => 'Type',
			'foreignKey' => 'Foreign Key',
			'comment' => 'Comment',
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

		$criteria->compare('merchantId',$this->merchantId);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('foreignKey',$this->foreignKey);

		$criteria->compare('comment',$this->comment,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('createTime',$this->createTime,true);

		$criteria->compare('updateTime',$this->updateTime,true);

		return new CActiveDataProvider('Comment', array(
			'criteria'=>$criteria,
		));
	}
}