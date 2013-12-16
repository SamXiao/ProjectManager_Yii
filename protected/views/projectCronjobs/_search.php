<div class="well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<div class="control-group">
		<?php echo $form->label($model,'id',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'id', array('size' => '10', 'maxlength' => '10', )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'name', array('size' => '60', 'maxlength' => '1024', )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'result',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'result', array()); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'description',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model, 'description', array('rows' => '6', 'cols' => '50', )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'modified',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'modified', array()); ?>
		</div>
	</div>


	<div class="control-group">
		<div class="controls">
			<a class="btn" id="search">
				<i class="icon-search"></i>
				Search
			</a>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->