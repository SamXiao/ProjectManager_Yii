<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messages-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
)); ?>
	<legend><?php echo $model->isNewRecord ? 'Create' : 'Edit'?> Project</legend>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'name', array('size' => '45', 'maxlength' => '45', )); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'title', array('size' => '45', 'maxlength' => '45', )); ?>
		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model, 'content', array('rows' => '6', 'cols' => '50', )); ?>
		<?php echo $form->error($model,'content'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'image_path',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->fileField($model, 'image_path', array()); ?>
		<?php echo $form->error($model,'image_path'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'created',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'created', array('class' => 'datePicker', 'value' => CUtils::formatDate($model->created), )); ?>
		<?php echo $form->error($model,'created'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'type',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->dropDownList($model, 'type', CHtml::listData(MessageType::model()->findAll(array('order'=>'name ASC,id ASC')),'id','name'), array()); ?>
		<?php echo $form->error($model,'type'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'enable',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->checkBox($model, 'enable', array()); ?>
		<?php echo $form->error($model,'enable'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'send_action',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model, 'send_action', array('size' => '60', 'maxlength' => '255', )); ?>
		<?php echo $form->error($model,'send_action'); ?>
		</div>
	</div>

	<div class="form-actions">
		<a class="btn btn-primary" href="javascript:$('#messages-form').submit();">
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