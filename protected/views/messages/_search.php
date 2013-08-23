<div class="well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<div class="control-group">
		<?php echo $form->label($model,'id',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'id', array()); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'name', array('size' => '45', 'maxlength' => '45', )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'title',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'title', array('size' => '45', 'maxlength' => '45', )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'content',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model, 'content', array('rows' => '6', 'cols' => '50', )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'image_path',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->fileField($model, 'image_path', array()); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'created',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'created', array('class' => 'datePicker', 'value' => CUtils::formatDate($model->created), )); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'type',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->dropDownList($model, 'type', CHtml::listData(MessageType::model()->findAll(array('order'=>'name ASC,id ASC')),'id','name'), array()); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'enable',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($model, 'enable', array()); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'send_action',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model, 'send_action', array('size' => '60', 'maxlength' => '255', )); ?>
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