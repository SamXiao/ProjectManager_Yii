<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'<?php echo $this->modelClass; ?>'), //Nav-List Title
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo '<?php $this->widget(\'CFlashMessages\');?>';?>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
$model = CActiveRecord::model($this->modelClass);
$tabBlank = "\t\t";
foreach($this->tableSchema->columns as $column){
    if ($field = $model->getCustomedField($column->name)) {
        switch ($field['type']){
            case 'dateField':
                echo "{$tabBlank}array('name'=>'{$column->name}','type'=>'raw','value'=>CUtils::formatDate(\$model->{$column->name})),\n";
                break;
            case 'dropDownList':
                $echoString = "{$tabBlank}'".$column->name."',\n";
                if (array_key_exists('modelClass', $field)) {
                    $relations = $model->relations();
                    foreach ($relations as $key => $relation){
                        if($relation[2] === $column->name){
                            $echoString = "{$tabBlank}array('name'=>'{$column->name}', 'type'=>'raw', 'value'=>\$model->{$key}->name),\n";
                        }
                    }
                } else if (array_key_exists('data', $field)) {
                    /** @todo finish get value from data **/
                   /* $data = $field['data'];
                    $echoString = "{$tabBlank}array('name'=>'{$column->name}','value'=>'\$data->{$key}->name'),\n";*/
                } 
                $relations = $model->relations();
               
                
                echo $echoString;
                break;
            default:
                echo "{$tabBlank}'{$column->name}',\n";
        }
    }else{
        echo "{$tabBlank}'{$column->name}',\n";
    }
}
?>
	),
)); ?>
