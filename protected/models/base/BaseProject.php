<?php

/**
 * This is the model class for table "pm_project".
 *
 * The followings are the available columns in table 'pm_project':
 * @property integer $id
 * @property string $name
 * @property string $strat_date
 * @property string $budget
 * @property string $created
 * @property string $modified
 */
class BaseProject extends AMapper
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'pm_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, strat_date, budget, created', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('budget', 'length', 'max'=>10),
			array('modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, strat_date, budget, created, modified', 'safe', 'on'=>'search'),
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
			'strat_date' => 'Strat Date',
			'budget' => 'Budget',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('strat_date',$this->strat_date,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return array customized fields (name=>label)
	 */
	public function customFields()
	{
		return array(
    		'id' => array( 'type' => 'textField', 'htmlOptions'=>array( ),  ),
    		'name' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>128 ),  ),
    		'strat_date' => array( 'type' => 'dateField', 'htmlOptions'=>array( ),  ),
    		'budget' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>10,'maxlength'=>10 ),  ),
    		'created' => array( 'type' => 'textField', 'htmlOptions'=>array( ),  ),
    		'modified' => array( 'type' => 'textField', 'htmlOptions'=>array( ),  ),
		);
	}




}