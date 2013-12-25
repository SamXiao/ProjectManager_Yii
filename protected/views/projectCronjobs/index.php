<?php
$baseUrl = Yii::app()->baseUrl;
$this->breadcrumbs=array(
	'Project Cronjobs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'ProjectCronjobs'), //Nav-List Title
	array('label'=>'Manage ProjectCronjobs', 'url'=>array('index')),
	array('label'=>'Create ProjectCronjobs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('project-cronjobs-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-content">
<legend>Manage Project Cronjobs</legend>

<?php $this->widget('CFlashMessages');?>


<div class="row-fluid" style="margin-bottom: 10px; text-align: right;">
	<a class="btn btn-primary btn-sm" href="<?php echo CHtml::normalizeUrl(array('create')); ?>">
		<i class="icon-pencil icon-white"></i>
		&nbsp;Create Project&nbsp;
	</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-cronjobs-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'name',
		'result',
		'description',
		'modified',
        'callbackUrl',
		array(
			'class'=>'CButtonColumn',
            'template'=>'<div class="action-buttons">{update}{delete}</div>',
            'updateButtonImageUrl'=>false,
            'updateButtonOptions'=>array('class'=>'blue'),
            'updateButtonLabel'=>'<i class="icon-edit bigger-130"></i>',
            'deleteButtonImageUrl'=>false,
            'deleteButtonOptions'=>array('class'=>'red'),
            'deleteButtonLabel'=>'<i class="icon-trash bigger-130"></i>'
		),
	),
)); ?>

					</div><!-- /.page-content -->