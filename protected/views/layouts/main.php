<?php $this->beginContent('//layouts/sections/main'); ?>

<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>
<?php require  dirname(__FILE__) . '/sections/sidebar.php'; ?>

			<div class="main-content">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>