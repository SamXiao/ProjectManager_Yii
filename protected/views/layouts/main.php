<?php
/**
 * header html5
 * @author Sam Xiao
 * @since 1.0
 */ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <meta name="description" content="">
    <meta name="author" content="">



	<?php
		$baseUrl = Yii::app()->baseUrl;
		/**
		 * include Js Files
		 */ 
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerCoreScript('jquery.ui');
		Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/bootstrap.js');
		Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/default.js');
		/**
		 * include Css Files
		 */
		Yii::app()->clientScript->registerCssFile($baseUrl.'/css/bootstrap.css');
		Yii::app()->clientScript->registerCssFile($baseUrl.'/css/bootstrap-overload.css');
		Yii::app()->clientScript->registerCssFile($baseUrl.'/css/styles.css');
		Yii::app()->clientScript->registerCssFile($baseUrl.'/css/jquery-ui.css');
		
	?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
		<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a class="brand" href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a>
		<div class="nav-collapse">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
					'skin'=>'top',
				)); ?>
		</div>
		<div class="navbar-text pull-right">
		<?php 
			if (Yii::app()->user->isGuest){
				echo 'Login';
			} else {
				echo 'Login as '.Yii::app()->user->name;
			}
		?>
		</div>
	</div>
  </div>
</div>
<?php 
	/** breadcrumbs **/
	/*if(isset($this->breadcrumbs)):
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); 
	endif*/
?>
		
<?php echo $content; ?>
	


<div id="footer" class="row" align="center">
	Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
	All Rights Reserved.<br/>
	<?php echo Yii::powered(); ?>
</div><!-- footer -->


</body>
</html>
