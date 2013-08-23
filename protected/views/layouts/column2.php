<?php $this->beginContent('//layouts/sections/main'); ?>

<div class="container-fluid container " >
	<div class="row-fluid">
	<div class="span2 well"  style="padding: 8px 0;">
		<?php
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'firstItemCssClass'=>'nav-header',
				'htmlOptions'=>array('class'=>'nav nav-list'),
			));
		?>
	</div>
	<div class="span10">
		<?php echo $content; ?>
	</div>
	</div>
</div>
<?php $this->endContent(); ?>