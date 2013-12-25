<?php
$this->breadcrumbs=array(
	'Project Cronjobs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'ProjectCronjobs'), //Nav-List Title
	array('label'=>'Manage ProjectCronjobs', 'url'=>array('index')),
);
?>
<div class="page-content">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>