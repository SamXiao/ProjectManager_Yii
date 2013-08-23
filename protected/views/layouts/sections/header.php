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