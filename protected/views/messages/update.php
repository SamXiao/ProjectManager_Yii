<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Messages'), //Nav-List Title
	array('label'=>'Manage Messages', 'url'=>array('index')),
	array('label'=>'Create Messages', 'url'=>array('create')),
	array('label'=>'View Messages', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Messages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>