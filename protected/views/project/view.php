<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Project'), //Nav-List Title
	array('label'=>'Manage Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Project #<?php echo $model->id; ?></h1>

<?php $this->widget('CFlashMessages');?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array('name'=>'strat_date','type'=>'raw','value'=>CUtils::formatDate($model->strat_date)),
		'budget',
		'created',
		'modified',
	),
)); ?>
