<?php

/**
 * This is the model class for table "pm_project_cronjobs".
 *
 * The followings are the available columns in table 'pm_project_cronjobs':
 * @property string $id
 * @property string $name
 * @property string $result
 * @property string $description
 * @property string $modified
 */
class ProjectCronjob extends BaseProjectCronjob
{
    public $callbackUrl;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProjectCronjob the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function afterFind(){
        $this->callbackUrl = Yii::app()->createAbsoluteUrl('API/cronjob', array('c'=>$this->id));
    }

    public function beforeSave() {
        //         if ($this->isNewRecord){

        //         }
        // //             $this->created = new CDbExpression('NOW()');
        // //         else
        $this->modified = time();

        return parent::beforeSave();
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
            array('name', 'length', 'max'=>1024),
            array('modified', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, result, description, modified', 'safe', 'on'=>'search'),
        );
    }

    public function recordCronjobRunning($result){
        $this->result = $result;
        $this->save();
    }
}