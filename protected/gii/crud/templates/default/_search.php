<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="well">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<div class="control-group">
		<?php echo "<?php echo \$form->label(\$model,'{$column->name}',array('class'=>'control-label')); ?>\n"; ?>
		<div class="controls">
			<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		</div>
	</div>

<?php endforeach; ?>

	<div class="control-group">
		<div class="controls">
			<a class="btn" id="search">
				<i class="icon-search"></i>
				Search
			</a>
		</div>
	</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->