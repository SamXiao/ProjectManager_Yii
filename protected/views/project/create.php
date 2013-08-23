<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Project'), //Nav-List Title
	array('label'=>'Manage Project', 'url'=>array('index')),
);
?>

<h1>Create Project</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>