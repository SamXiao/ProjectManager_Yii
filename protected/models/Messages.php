<?php

/**
 * This is the model class for table "messages".
 *
 * The followings are the available columns in table 'messages':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $content
 * @property string $image_path
 * @property integer $created
 * @property integer $type
 * @property integer $enable
 * @property string $send_action
 *
 * The followings are the available model relations:
 * @property MessageType $type0
 * @property UsersMessages[] $usersMessages
 */
class Messages extends AMapper
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Messages the static model class
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
		return 'messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, title, content, created, type, enable, send_action', 'required'),
			array('created, type, enable', 'numerical', 'integerOnly'=>true),
			array('name, title', 'length', 'max'=>45),
			array('image_path, send_action', 'length', 'max'=>255),
			array('image_path', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, content, image_path, created, type, enable, send_action', 'safe', 'on'=>'search'),
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
			'type0' => array(self::BELONGS_TO, 'MessageType', 'type'),
			'usersMessages' => array(self::HAS_MANY, 'UsersMessages', 'message_id'),
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
			'title' => 'Title',
			'content' => 'Content',
			'image_path' => 'Image Path',
			'created' => 'Created',
			'type' => 'Type',
			'enable' => 'Enable',
			'send_action' => 'Send Action',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('type',$this->type);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('send_action',$this->send_action,true);

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
    		'name' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>45,'maxlength'=>45 ),  ),
    		'title' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>45,'maxlength'=>45 ),  ),
    		'content' => array( 'type' => 'textArea', 'htmlOptions'=>array( 'rows'=>6, 'cols'=>50) ),
    		'image_path' => array( 'type' => 'fileField', 'htmlOptions'=>array( ),  ),
    		'created' => array( 'type' => 'dateField', 'htmlOptions'=>array( ),  ),
    		'type' => array( 'type' => 'dropDownList', 'htmlOptions'=>array( ), 'modelClass'=>'MessageType' ),
    		'enable' => array( 'type' => 'checkBox', 'htmlOptions'=>array( ),  ),
    		'send_action' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>255 ),  ),
		);
	}
	    

	
	
}