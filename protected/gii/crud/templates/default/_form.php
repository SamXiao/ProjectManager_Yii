<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">

<?php 
$fileHeader = '';
if($this->uploadFile){
    $fileHeader = "'enctype'=>'multipart/form-data'";
}
echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', {$fileHeader}),
)); ?>\n"; ?>
	<legend><?php echo '<?php echo $model->isNewRecord ? \'Create\' : \'Edit\'?>'; ?> Project</legend>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="control-group">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column,"array('class'=>'control-label')")."; ?>\n"; ?>
		<div class="controls">
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
	</div>

<?php
}
?>
	<div class="form-actions">
		<a class="btn btn-primary" href="javascript:$('<?php echo "#".$this->class2id($this->modelClass)."-form";?>').submit();">
			<i class="icon-pencil icon-white"></i>
			&nbsp;<?php echo '<?php echo $model->isNewRecord ? \'Create\' : \'Save\';?>'; ?>&nbsp;
		</a>	
		<a class="btn btn-danger" href="<?php echo '<?php echo CHtml::normalizeUrl(array("index"));?>'; ?>">
			<i class="icon-arrow-left icon-white"></i>
			&nbsp;Cancel&nbsp;
		</a>
	</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->