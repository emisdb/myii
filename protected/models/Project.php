<?php

/**
 * This is the model class for table "{{project}}".
 *
 * The followings are the available columns in table '{{project}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $state
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Issue[] $issues
 * @property User[] $tblUsers
 */
class Project extends MARC
{
    const STATUS_NOT=0;
    const STATUS_STARTED=1;
    const STATUS_FINISHED=2;
    const STATUS_SUSPENDED=3;
        public function getStateOptions()
        {
            return array(
            self::STATUS_NOT=>'Not yet started',
            self::STATUS_STARTED=>'Started',
            self::STATUS_FINISHED=>'Finished',
            self::STATUS_SUSPENDED=>'Suspended',
            );
        } 
public static function getAllowedStateRange()
       {
       return array(
       self::STATUS_NOT,
       self::STATUS_STARTED,
       self::STATUS_FINISHED,
       self::STATUS_SUSPENDED,
         );
} 
public function getStateText()
{
    $statusOptions=$this->stateOptions;
    return isset($statusOptions[$this->state]) ? $statusOptions[$this->state] : "unknown state ({$this->state})";
}
/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{project}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('state', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, state,create_time, update_time, update_user_id, create_user_id', 'safe', 'on'=>'search'),
                      array('state', 'in', 'range'=>self::getAllowedStateRange()),
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
			'issues' => array(self::HAS_MANY, 'Issue', 'project_id'),
			'issues_null' => array(self::HAS_MANY, 'Issue', 'project_id','condition'=>'issue_id IS NULL'),
			'users' => array(self::MANY_MANY, 'User', '{{project_user_assignment}}(project_id, user_id)'),
		);
	}
/**
* @return array of valid users for this project, indexed by user IDs
*/
        public function getUserOptions()
        {
            $usersArray = CHtml::listData($this->users, 'id', 'name');
            return $usersArray;
        }  
        public function getIssueView($model=null)
        {
            $issuesArray=array();
            if(is_null($model)) $issues=$this->issues_null;
            else $issues=$model->issues;
            foreach ($issues as $value) {
                $arr=array('label'=>"<div><b>Name:</b>".chtml::link($value->getTypeText().": ".$value->name,array('issue/view','id'=>$value->id))
                    ."</div><div><b>Description:</b>".$value->description."</div><div><b>Status:</b>".$value->getStatusText()."</div>",
                    );
                if(count($value->issues)>0) $arr['items']=$this->getIssueView($value);
               $issuesArray[]=$arr; 
            }
            return $issuesArray;
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'state' => 'State',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
