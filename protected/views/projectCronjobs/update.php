<?php
$this->breadcrumbs=array(
	'Project Cronjobs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'ProjectCronjobs'), //Nav-List Title
	array('label'=>'Manage ProjectCronjobs', 'url'=>array('index')),
	array('label'=>'Create ProjectCronjobs', 'url'=>array('create')),
	array('label'=>'View ProjectCronjobs', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<div class="page-content">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>