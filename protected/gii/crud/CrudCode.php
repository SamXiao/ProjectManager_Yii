<?php
/**
 * 
 * 
 * @author Sam Xiao
 *
 */
class CrudCode extends CCodeModel
{

    public $model;

    public $controller;

    public $baseControllerClass = 'Controller';

    private $_modelClass;

    private $_table;

    public $uploadFile = FALSE;

    public $uploadFields = array();

    public function rules ()
    {

        return array_merge(parent::rules(), array(array('model, controller', 'filter', 'filter' => 'trim' ), 
            array('model, controller, baseControllerClass', 'required' ), 
            array('model', 'match', 'pattern' => '/^\w+[\w+\\.]*$/', 'message' => '{attribute} should only contain word characters and dots.' ), 
            array('controller', 'match', 'pattern' => '/^\w+[\w+\\/]*$/', 'message' => '{attribute} should only contain word characters and slashes.' ), 
            array('baseControllerClass', 'match', 'pattern' => '/^[a-zA-Z_]\w*$/', 'message' => '{attribute} should only contain word characters.' ), 
            array('baseControllerClass', 'validateReservedWord', 'skipOnError' => true ), array('model', 'validateModel' ), 
            array('baseControllerClass', 'sticky' ) ));
    }

    public function attributeLabels ()
    {

        return array_merge(parent::attributeLabels(), array('model' => 'Model Class', 'controller' => 'Controller ID', 
            'baseControllerClass' => 'Base Controller Class' ));
    }

    public function requiredTemplates ()
    {

        return array('controller.php' );
    }

    public function init ()
    {

        if (Yii::app()->db === null) throw new CHttpException(500, 'An active "db" connection is required to run this generator.');
        parent::init();
    }

    public function successMessage ()
    {

        $link = CHtml::link('try it now', Yii::app()->createUrl($this->controller), array('target' => '_blank' ));
        return "The controller has been generated successfully. You may $link.";
    }

    public function validateModel ($attribute, $params)
    {

        if ($this->hasErrors('model')) return;
        $class = @Yii::import($this->model, true);
        if (! is_string($class) || ! $this->classExists($class))
            $this->addError('model', "Class '{$this->model}' does not exist or has syntax error.");
        else if (! is_subclass_of($class, 'CActiveRecord'))
            $this->addError('model', "'{$this->model}' must extend from CActiveRecord.");
        else {
            $table = CActiveRecord::model($class)->tableSchema;
            if ($table->primaryKey === null)
                $this->addError('model', "Table '{$table->name}' does not have a primary key.");
            else if (is_array($table->primaryKey))
                $this->addError('model', "Table '{$table->name}' has a composite primary key which is not supported by crud generator.");
            else {
                $this->_modelClass = $class;
                $this->_table = $table;
            }
        }
    }

    public function prepare ()
    {
        /** check if need upload file **/
        
        $model = CActiveRecord::model($this->modelClass);
        foreach($this->tableSchema->columns as $column){
            if ($field = $model->getCustomedField($column->name)) {
                if($field['type'] === 'fileField'){
                    $this->uploadFile = true;
                    $this->uploadFields[] = $column->name;
                }
            }
        }
        
        $this->files = array();
        $templatePath = $this->templatePath;
        $controllerTemplateFile = $templatePath . DIRECTORY_SEPARATOR . 'controller.php';
        $this->files[] = new CCodeFile($this->controllerFile, $this->render($controllerTemplateFile));
        $files = scandir($templatePath);
        foreach ($files as $file) {
            if (is_file($templatePath . '/' . $file) && CFileHelper::getExtension($file) === 'php' && $file !== 'controller.php') {
                $this->files[] = new CCodeFile($this->viewPath . DIRECTORY_SEPARATOR . $file, $this->render($templatePath . '/' . $file));
            }
        }
    }

    public function getModelClass ()
    {

        return $this->_modelClass;
    }

    public function getControllerClass ()
    {

        if (($pos = strrpos($this->controller, '/')) !== false)
            return ucfirst(substr($this->controller, $pos + 1)) . 'Controller';
        else
            return ucfirst($this->controller) . 'Controller';
    }

    public function getModule ()
    {

        if (($pos = strpos($this->controller, '/')) !== false) {
            $id = substr($this->controller, 0, $pos);
            if (($module = Yii::app()->getModule($id)) !== null) return $module;
        }
        return Yii::app();
    }

    public function getControllerID ()
    {

        if ($this->getModule() !== Yii::app())
            $id = substr($this->controller, strpos($this->controller, '/') + 1);
        else
            $id = $this->controller;
        if (($pos = strrpos($id, '/')) !== false)
            $id[$pos + 1] = strtolower($id[$pos + 1]);
        else
            $id[0] = strtolower($id[0]);
        return $id;
    }

    public function getUniqueControllerID ()
    {

        $id = $this->controller;
        if (($pos = strrpos($id, '/')) !== false)
            $id[$pos + 1] = strtolower($id[$pos + 1]);
        else
            $id[0] = strtolower($id[0]);
        return $id;
    }

    public function getControllerFile ()
    {

        $module = $this->getModule();
        $id = $this->getControllerID();
        if (($pos = strrpos($id, '/')) !== false)
            $id[$pos + 1] = strtoupper($id[$pos + 1]);
        else
            $id[0] = strtoupper($id[0]);
        return $module->getControllerPath() . '/' . $id . 'Controller.php';
    }

    public function getViewPath ()
    {

        return $this->getModule()
            ->getViewPath() . '/' . $this->getControllerID();
    }

    public function getTableSchema ()
    {

        return $this->_table;
    }
    /**
     * Generate all field types 
     * 
     * @param string $modelClass
     * @param mixed $column
     * @param enum $type ( form | html )
     * @return string|boolean
     * 
     * @author Sam Xiao 
     * @since  1.0
     */
    public function generateField ($modelClass, $column, $type = 'form')
    {
        $model = CActiveRecord::model($modelClass);
        if ($field = $model->getCustomedField($column->name)) {

            if(!array_key_exists('htmlOptions', $field)){
                $field['htmlOptions'] = array();
            }
            if ($type == 'html') {
                $methodName = 'CHtml::active' . ucfirst($field['type']);
            } else {
                $methodName = '$form->' . $field['type'];
            }
            $returnString = '';
            switch ($field['type']) {
                case 'dateField':
                    if ($type == 'html') {
                        $methodName = 'CHtml::activeTextField';
                    } else {
                        $methodName = '$form->textField';
                    }
                    if (isset($field['htmlOptions']['class'])) {
                        $field['htmlOptions']['class'] = $field['htmlOptions']['class'] . ' datePicker';
                    } else {
                        $field['htmlOptions']['class'] = 'datePicker';
                    }
                    $field['htmlOptions']['value-eval'] = "CUtils::formatDate(\$model->{$column->name})";
                    $returnString = $methodName . "(\$model, '{$column->name}', array(" . $this->array2string($field['htmlOptions']) . "))";
                    break;
                case 'dropDownList':
                    if (array_key_exists('modelClass', $field)) {
                        $relationModel = $field['modelClass'];
                        $valueField = 'id';
                        $displayField = 'name';
                        $data = "CHtml::listData({$relationModel}::model()->findAll(array('order'=>'{$displayField} ASC,id ASC')),'{$valueField}','{$displayField}')";
                        $returnString = $methodName . "(\$model, '{$column->name}', {$data}, array(" . $this->array2string($field['htmlOptions']) . "))";
                    } else if (array_key_exists('data', $field)) {
                        $returnString = $methodName . "(\$model, '{$column->name}', array(" . $this->array2string($field['data']) . "), array(" . $this->array2string($field['htmlOptions']) . "))";
                    } else {
                        if ($type == 'html') {
                            $methodName = 'CHtml::activeTextField';
                        } else {
                            $methodName = '$form->textField';
                        }
                        $returnString = $methodName . "(\$model, '{$column->name}', array(" . $this->array2string($field['htmlOptions']) . "))";
                    }
                    break;

                case 'fileField':
                    $this->uploadFile = true;
                case 'checkBox':
                case 'radioButton':
                case 'radioButtonList':
                case 'checkBoxList':
                case 'hiddenField':
                case 'textField':
                case 'passwordField':
                case 'textArea':
                default:
                    $returnString = $methodName . "(\$model, '{$column->name}', array(" . $this->array2string($field['htmlOptions']) . "))";
                    break;
            }
            return $returnString;
        } else {
            return FALSE;
        }
    }

    public function generateInputLabel ($modelClass, $column)
    {

        return "CHtml::activeLabelEx(\$model,'{$column->name}')";
    }

    public function array2string ($arr)
    {

        $string = '';
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $string .= $this->array2string($value);
            } else {
                if (preg_match('/(-eval)$/i', $key)) {
                    $key = str_replace('-eval', '', $key);
                    $string .= "'{$key}' => $value";
                } else {
                    $string .= "'{$key}' => '$value'";
                }
               
            }
            $string .= ", ";
        }
        return $string;
    }

    /**
	 * 
	 * @param unknown_type $modelClass
	 * @param unknown_type $column
	 * 
	 * 
	 * Be modified by Sam Xiao at 2012/05/14
	 */
    public function generateInputField ($modelClass, $column)
    {

        $fieldString = $this->generateField($modelClass, $column, 'html');
        if ($fieldString) {
            return $fieldString;
        } else {
            if ($column->type === 'boolean')
                return "CHtml::activeCheckBox(\$model,'{$column->name}')";
            else if (stripos($column->dbType, 'text') !== false)
                return "CHtml::activeTextArea(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50))";
            else {
                if (preg_match('/^(password|pass|passwd|passcode)$/i', $column->name))
                    $inputField = 'activePasswordField';
                else
                    $inputField = 'activeTextField';
                if ($column->type !== 'string' || $column->size === null)
                    return "CHtml::{$inputField}(\$model,'{$column->name}')";
                else {
                    if (($size = $maxLength = $column->size) > 60) $size = 60;
                    return "CHtml::{$inputField}(\$model,'{$column->name}',array('size'=>$size,'maxlength'=>$maxLength))";
                }
            }
        }
    }

    public function generateActiveLabel ($modelClass, $column, $options = array())
    {

        return "\$form->labelEx(\$model,'{$column->name}',{$options})";
    }

    public function generateActiveField ($modelClass, $column)
    {

        $fieldString = $this->generateField($modelClass, $column);
        if ($fieldString) {
            return $fieldString;
        } else {
            if ($column->type === 'boolean')
                return "\$form->checkBox(\$model,'{$column->name}')";
            else if (stripos($column->dbType, 'text') !== false)
                return "\$form->textArea(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50))";
            else {
                if (preg_match('/^(password|pass|passwd|passcode)$/i', $column->name))
                    $inputField = 'passwordField';
                else
                    $inputField = 'textField';
                if ($column->type !== 'string' || $column->size === null)
                    return "\$form->{$inputField}(\$model,'{$column->name}')";
                else {
                    if (($size = $maxLength = $column->size) > 60) $size = 60;
                    return "\$form->{$inputField}(\$model,'{$column->name}',array('size'=>$size,'maxlength'=>$maxLength))";
                }
            }
        }
    }

    public function guessNameColumn ($columns)
    {

        foreach ($columns as $column) {
            if (! strcasecmp($column->name, 'name')) return $column->name;
        }
        foreach ($columns as $column) {
            if (! strcasecmp($column->name, 'title')) return $column->name;
        }
        foreach ($columns as $column) {
            if ($column->isPrimaryKey) return $column->name;
        }
        return 'id';
    }
}