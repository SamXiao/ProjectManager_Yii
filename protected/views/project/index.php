<?php
$assestUrl = Yii::app()->baseUrl;
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Project'), //Nav-List Title
	array('label'=>'Manage Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('project-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-content">
<legend>Manage Projects</legend>

    <?php $this->widget('CFlashMessages');?>
    <p><?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?></p>

    <div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
    	'model'=>$model,
    )); ?>
    </div><!-- search-form -->

    <div class="well">
    	<a class="btn btn-primary" href="<?php echo CHtml::normalizeUrl(array('create')); ?>">
    		<i class="icon-pencil icon-white"></i>
    		&nbsp;Create Project&nbsp;
    	</a>
    	<a class="btn btn-danger" id="batchDelete">
    		<i class="icon-trash icon-white"></i>
    		&nbsp;Suspend&nbsp;
    	</a>
    </div>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
    	'id'=>'project-grid',
    	'dataProvider'=>$model->search(),
    	//'filter'=>$model,
    	'columns'=>array(
    		array(
    			'selectableRows' => 2, //multiple checkboxes can be checked
    			'class' => 'CCheckBoxColumn',
    			'checkBoxHtmlOptions' => array('name' => 'selectedID[]'),
            ),
    		'name',
    		array('name'=>'strat_date','value'=>'CUtils::formatDate($data->strat_date)'),
    		'budget',
    		'created',
    		'modified',
    		array(
    			'class'=>'CButtonColumn',
                'updateButtonImageUrl'=>$assestUrl.'/images/edit.png',
                'viewButtonImageUrl'=>$assestUrl.'/images/view.png',
                'deleteButtonImageUrl'=>$assestUrl.'/images/delete.png',
    		),
    	),
    )); ?>
</div>