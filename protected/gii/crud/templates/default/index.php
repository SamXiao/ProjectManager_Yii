<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n\$baseUrl = Yii::app()->baseUrl;\n";

$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'<?php echo $this->modelClass; ?>'), //Nav-List Title
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<legend>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></legend>

<?php echo '<?php $this->widget(\'CFlashMessages\');?>';?>

<p><?php echo "<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>"; ?></p>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<div class="well">	
	<a class="btn btn-primary" href="<?php echo "<?php echo CHtml::normalizeUrl(array('create')); ?>"; ?>">
		<i class="icon-pencil icon-white"></i>
		&nbsp;Create Project&nbsp;
	</a>	
	<a class="btn btn-danger" id="batchDelete">
		<i class="icon-trash icon-white"></i>
		&nbsp;Suspend&nbsp;
	</a>
</div>

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
$tabBlank = "\t\t";
$model = CActiveRecord::model($this->modelClass);
foreach($this->tableSchema->columns as $column)
{

    
	if(++$count==7){
	    echo "{$tabBlank}/*";
	}
	if($column->name == 'id'){
		echo "{$tabBlank}array(           
			'selectableRows' => 2, //multiple checkboxes can be checked
			'class' => 'CCheckBoxColumn',
			'checkBoxHtmlOptions' => array('name' => 'selectedID[]'),
        ),\n";
	}else{
        $field = $model->getCustomedField($column->name);
   
        if ( $field !== false) {
            switch ($field['type']){
                case 'dateField':
                    echo "{$tabBlank}array('name'=>'{$column->name}','value'=>'CUtils::formatDate(\$data->{$column->name})'),\n";
                    break;
                case 'dropDownList':
                    $relations = $model->relations();
                    $echoString = "{$tabBlank}'".$column->name."',\n";
                    foreach ($relations as $key => $relation){
                        if($relation[2] === $column->name){
                            $echoString = "{$tabBlank}array('name'=>'{$column->name}','value'=>'\$data->{$key}->name'),\n";
                        }
                    }
                    echo $echoString;
                    break;
                default:
		            echo "{$tabBlank}'".$column->name."',\n";
            }
        }else{
		    echo "{$tabBlank}'".$column->name."',\n";
		}
	}
	

}
if($count>=7){
    echo "{$tabBlank}*/\n";
}
?>
		array(
			'class'=>'CButtonColumn',
            'updateButtonImageUrl'=>$baseUrl.'/images/edit.png',
            'viewButtonImageUrl'=>$baseUrl.'/images/view.png',
            'deleteButtonImageUrl'=>$baseUrl.'/images/delete.png',
		),
	),
)); ?>
