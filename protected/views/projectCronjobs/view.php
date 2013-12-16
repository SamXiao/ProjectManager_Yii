<?php
$this->breadcrumbs=array(
	'Project Cronjobs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'ProjectCronjobs'), //Nav-List Title
	array('label'=>'Manage ProjectCronjobs', 'url'=>array('index')),
	array('label'=>'Create ProjectCronjobs', 'url'=>array('create')),
	array('label'=>'Update ProjectCronjobs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectCronjobs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View ProjectCronjobs #<?php echo $model->id; ?></h1>

<?php $this->widget('CFlashMessages');?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'result',
		'description',
		'modified',
	),
)); ?>
