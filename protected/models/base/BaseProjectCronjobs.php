<?php

/**
 * This is the model class for table "pm_project_cronjobs".
 *
 * The followings are the available columns in table 'pm_project_cronjobs':
 * @property string $id
 * @property string $name
 * @property integer $result
 * @property string $description
 * @property string $modified
 */
class BaseProjectCronjobs extends AMapper
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectCronjobs the static model class
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
		return 'pm_project_cronjobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, result, description', 'required'),
			array('result', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>1024),
			array('modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, result, description, modified', 'safe', 'on'=>'search'),
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
			'result' => 'Result',
			'description' => 'Description',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('result',$this->result);
		$criteria->compare('description',$this->description,true);
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
    		'id' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>10,'maxlength'=>10 ),  ),
    		'name' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>1024 ),  ),
    		'result' => array( 'type' => 'textField', 'htmlOptions'=>array( ),  ),
    		'description' => array( 'type' => 'textArea', 'htmlOptions'=>array( 'rows'=>6, 'cols'=>50) ),
    		'modified' => array( 'type' => 'textField', 'htmlOptions'=>array( ),  ),
		);
	}




}