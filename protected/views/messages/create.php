<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Messages'), //Nav-List Title
	array('label'=>'Manage Messages', 'url'=>array('index')),
);
?>

<h1>Create Messages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>