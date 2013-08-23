<?php

/**
 * This is the model class for table "core_member".
 *
 * The followings are the available columns in table 'core_member':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 */
class BaseMember extends AMapper
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return 'core_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, username, password, name, email', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('username, name, email', 'length', 'max'=>64),
			array('password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name, email', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'name' => 'Name',
			'email' => 'Email',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);

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
    		'username' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>64 ),  ),
    		'password' => array( 'type' => 'passwordField', 'htmlOptions'=>array(  'size'=>32,'maxlength'=>32 ),  ),
    		'name' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>64 ),  ),
    		'email' => array( 'type' => 'textField', 'htmlOptions'=>array(  'size'=>60,'maxlength'=>64 ),  ),
		);
	}




}