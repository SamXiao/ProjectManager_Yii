<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'<?php echo $this->modelClass; ?>'), //Nav-List Title
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('index')),
);
?>

<h1>Create <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>