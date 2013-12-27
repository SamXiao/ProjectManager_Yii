<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="row">
<div class="col-xs-12">
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
	<p class="note">Fields with <span class="required">*</span> are required.</p>


<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="form-group <?php echo "<?= ($model->hasErrors('name'))?'has-error':''?>"?>>
	    <?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column,"array('class'=>'col-sm-3 control-label no-padding-right')")."; ?>\n"; ?>
		<div class="col-xs-10 col-sm-4">
    		<span>
    		      <?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
    		</span>
		</div>
		<div class="help-block col-xs-12 col-sm-reset inline">
		  <?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
	</div>

<?php
}
?>
	<div class="clearfix form-actions">
	   <div class="col-md-offset-3 col-md-9">
    	   <button class="btn  btn-info" type="submit">
    			<i class="icon-pencil icon-white"></i>
                &nbsp;<?php echo '<?php echo $model->isNewRecord ? \'Create\' : \'Save\';?>'; ?>&nbsp;
    		</button>
    		<button class="btn app-btn-cancel" type="reset">
    			<i class="icon-arrow-left icon-white"></i>
    			&nbsp;Cancel&nbsp;
    		</button>
	   </div>
	</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
</div>
</div><!-- form -->