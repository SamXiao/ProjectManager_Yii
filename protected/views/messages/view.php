<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Messages'), //Nav-List Title
	array('label'=>'Manage Messages', 'url'=>array('index')),
	array('label'=>'Create Messages', 'url'=>array('create')),
	array('label'=>'Update Messages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Messages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Messages #<?php echo $model->id; ?></h1>

<?php $this->widget('CFlashMessages');?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'title',
		'content',
		'image_path',
		array('name'=>'created','type'=>'raw','value'=>CUtils::formatDate($model->created)),
		array('name'=>'type', 'type'=>'raw', 'value'=>$model->type0->name),
		'enable',
		'send_action',
	),
)); ?>
