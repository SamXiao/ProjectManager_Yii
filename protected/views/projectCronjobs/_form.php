<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-cronjobs-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>
	<legend><?php echo $model->isNewRecord ? 'Create' : 'Edit'?> Project</legend>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'name', array('size' => '60', 'maxlength' => '1024', )); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'result',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'result', array()); ?>
		<?php echo $form->error($model,'result'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model, 'description', array('rows' => '6', 'cols' => '50', )); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'modified',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'modified', array()); ?>
		<?php echo $form->error($model,'modified'); ?>
		</div>
	</div>

	<div class="form-actions">
		<a class="btn btn-primary" href="javascript:$('#project-cronjobs-form').submit();">
			<i class="icon-pencil icon-white"></i>
			&nbsp;<?php echo $model->isNewRecord ? 'Create' : 'Save';?>&nbsp;
		</a>	
		<a class="btn btn-danger" href="<?php echo CHtml::normalizeUrl(array("index"));?>">
			<i class="icon-arrow-left icon-white"></i>
			&nbsp;Cancel&nbsp;
		</a>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->