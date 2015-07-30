<?php

/**
 * This is the model class for table "prods".
 *
 * The followings are the available columns in table 'prods':
 * @property integer $id
 * @property string $name
 * @property integer $pic
 * @property integer $id_cats
 * @property integer $next
 * @property string $text
 * @property string $img
 * @property integer $id_tabs
 * @property string $good
 * @property integer $good_num
 *
 * The followings are the available model relations:
 * @property Pics $pic0
 * @property Prods $next0
 * @property Prods[] $prods
 * @property Cats $idCats
 * @property Tabs $idTabs
 * @property Pics[] $pics
 * @property TabCont[] $tabConts
 */
class Prods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prods the static model class
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
		return 'prods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, text', 'required'),
			array('pic, id_cats, next, id_tabs, good_num', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>80),
			array('img, good', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pic, id_cats, next, text, img, id_tabs, good, good_num', 'safe', 'on'=>'search'),
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
			'next0' => array(self::BELONGS_TO, 'Prods', 'next'),
			'prods' => array(self::HAS_MANY, 'Prods', 'next'),
			'idCats' => array(self::BELONGS_TO, 'Cats', 'id_cats'),
			'idTabs' => array(self::BELONGS_TO, 'Tabs', 'id_tabs'),
			'idTabs1' => array(self::BELONGS_TO, 'Tabs', 'id_tabs', 'select'=>'tab'),
			'pics' => array(self::MANY_MANY, 'Pics', 'symbs(id_prods, id_pics)'),
			'tabConts' => array(self::HAS_MANY, 'TabCont', 'id_prods'),
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
			'id_cats' => 'Id Cats',
			'next' => 'Next',
			'text' => 'Text',
			'img' => 'Img',
			'id_tabs' => 'Id Tabs',
			'good' => 'Good',
			'good_num' => 'Good Num',
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
		$criteria->compare('id_cats',$this->id_cats);
		$criteria->compare('next',$this->next);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('id_tabs',$this->id_tabs);
		$criteria->compare('good',$this->good,true);
		$criteria->compare('good_num',$this->good_num);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}