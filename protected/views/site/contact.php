<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'subject', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'body', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
		</div>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>	
	<div class="control-group">
		<?php echo $form->labelEx($model,'verifyCode', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php $this->widget('CCaptcha'); ?>
		</div>

	</div>
	<div class="control-group">
		<div class="controls">
    		<?php echo $form->textField($model,'verifyCode'); ?>
    		<div class="hint">Please enter the letters as they are shown in the image above.
    		<br/>Letters are not case-sensitive.</div>
    		<?php echo $form->error($model,'verifyCode'); ?>
		</div>
	</div>
	<?php endif; ?>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Sign in</button>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>