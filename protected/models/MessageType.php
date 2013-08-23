<?php

/**
 * This is the model class for table "message_type".
 *
 * The followings are the available columns in table 'message_type':
 * @property integer $id
 * @property string $name
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Messages[] $messages
 */
class MessageType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MessageType the static model class
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
		return 'message_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, image', 'required'),
			array('name', 'length', 'max'=>45),
			array('image', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, image', 'safe', 'on'=>'search'),
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
			'messages' => array(self::HAS_MANY, 'Messages', 'type'),
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
			'image' => 'Image',
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
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
		
	/**
	 * @return array customized fields (name=>label)
	 * type : textField|passwordField|radioButton|radioButtonList|textArea|textField|checkBox|checkBoxList|dropDownList|fileField|hiddenField|dateField
	 *
	 * @todo textField|passwordField|radioButton|radioButtonList|textArea|textField|checkBox|checkBoxList|dropDownList|fileField|hiddenField
	 */
	public function customFields()
	{
		return array(
    		'id' => array( 'type' => 'textField', 'htmlOptions'=>array( ) ),
    		'name' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>45,'maxlength'=>45 ) ),
    		'image' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>255 ) ),
		);
	}
	    
    /**
	 * 
	 * @param unknown_type $name
	 * @return array|boolean
	 */
    public function getCustomedField ($name)
    {

        $fields = $this->customFields();
        if (isset($fields[$name])) {
            return $fields[$name];
        } else {
            return FALSE;
        }
    }
	
	
}