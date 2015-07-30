<?php

/**
 * This is the model class for table "tabs".
 *
 * The followings are the available columns in table 'tabs':
 * @property integer $id
 * @property string $format
 * @property string $tab
 *
 * The followings are the available model relations:
 * @property Prods[] $prods
 */
class Tabs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tabs the static model class
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
		return 'tabs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('format, tab', 'required'),
			array('format', 'length', 'max'=>800),
			array('tab', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, format, tab', 'safe', 'on'=>'search'),
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
			'prods' => array(self::HAS_MANY, 'Prods', 'id_tabs'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'format' => 'Format',
			'tab' => 'Tab',
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
		$criteria->compare('format',$this->format,true);
		$criteria->compare('tab',$this->tab,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}