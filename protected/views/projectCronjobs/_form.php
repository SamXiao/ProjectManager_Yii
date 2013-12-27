<div class="page-header">
	<h1><?php echo $model->isNewRecord ? 'Create' : 'Edit'?> Project</h1>
</div>
<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-cronjobs-form',
    'enableClientValidation' => false,
	'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="form-group <?= ($model->hasErrors('name'))?'has-error':''?>">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-xs-10 col-sm-4">
		<span>
		<?php echo $form->textField($model, 'name', array('size' => '60', 'maxlength' => '1024','class'=>'width-100' )); ?>
		</span>
		</div>
		<div class="help-block col-xs-12 col-sm-reset inline"><?php echo $form->error($model,'name'); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textArea($model, 'description', array('rows' => '6', 'cols' => '50','class'=>'col-xs-10 col-sm-5'  )); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<?php if(!$model->isNewRecord):?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'result',array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model, 'result', array('class'=>'col-xs-10 col-sm-5' )); ?>
		<?php echo $form->error($model,'result'); ?>
		</div>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'modified',array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model, 'modified', array('class'=>'col-xs-10 col-sm-5')); ?>
		<?php echo $form->error($model,'modified'); ?>
		</div>
	</div>

	<?php endif;?>
	<div class="clearfix form-actions">
	   <div class="col-md-offset-3 col-md-9">
    	   <button class="btn  btn-info" type="submit">
    			<i class="icon-pencil icon-white"></i>
    			&nbsp;<?php echo $model->isNewRecord ? 'Create' : 'Save';?>&nbsp;
    		</button>
    		<button class="btn" type="reset">
    			<i class="icon-arrow-left icon-white"></i>
    			&nbsp;Cancel&nbsp;
    		</button>
	   </div>

	</div>
<?php $this->endWidget(); ?>
</div>
</div><!-- form -->