<?php

/**
 * This is the model class for table "cats".
 *
 * The followings are the available columns in table 'cats':
 * @property integer $id
 * @property string $name
 * @property integer $pic
 * @property integer $par
 * @property integer $next
 *
 * The followings are the available model relations:
 * @property Pics $pic0
 * @property Cats $par0
 * @property Cats[] $cats
 * @property Cats $next0
 * @property Cats[] $cats1
 * @property Prods[] $prods
 */
class Cats extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cats the static model class
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
		return 'cats';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('pic, par, next', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pic, par, next', 'safe', 'on'=>'search'),
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
			'pic0' => array(self::BELONGS_TO, 'Pics', 'pic'),
			'par0' => array(self::BELONGS_TO, 'Cats', 'par'),
			'cats' => array(self::HAS_MANY, 'Cats', 'par'),
			'next0' => array(self::BELONGS_TO, 'Cats', 'next'),
			'cats1' => array(self::HAS_MANY, 'Cats', 'next'),
			'prods' => array(self::HAS_MANY, 'Prods', 'id_cats'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'pic' => 'Pic',
			'par' => 'Par',
			'next' => 'Next',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pic',$this->pic);
		$criteria->compare('par',$this->par);
		$criteria->compare('next',$this->next);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}