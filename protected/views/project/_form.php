<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>
	<legend><?php echo $model->isNewRecord ? 'Create' : 'Edit'?> Project</legend>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'id', array()); ?>
		<?php echo $form->error($model,'id'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'name', array('size' => '60', 'maxlength' => '128', )); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'strat_date',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'strat_date', array('class' => 'datePicker', 'value' => CUtils::formatDate($model->strat_date), )); ?>
		<?php echo $form->error($model,'strat_date'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'budget',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'budget', array('size' => '10', 'maxlength' => '10', )); ?>
		<?php echo $form->error($model,'budget'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'created',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'created', array()); ?>
		<?php echo $form->error($model,'created'); ?>
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
		<a class="btn btn-primary" href="javascript:$('#project-form').submit();">
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