<?php $this->beginContent('//layouts/sections/basicTemplate'); ?>

<?php require 'sections/header.php';?>

<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>
	<div class="main-container-inner">
    	<a class="menu-toggler" id="menu-toggler" href="#">
    		<span class="menu-text"></span>
    	</a>
        <?php require 'sections/sidebar.php'; ?>

    	<div class="main-content">

            <?php require 'sections/breadcrumbs.php'; ?>

    		<?php echo $content; ?>

    	</div>
	</div><!-- /.main-container-inner -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="icon-double-angle-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->

<?php require 'sections/footer.php';?>

<?php $this->endContent(); ?>