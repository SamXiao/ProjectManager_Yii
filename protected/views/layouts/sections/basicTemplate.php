<?php
/**
 * header html5
 * @author Sam Xiao
 * @since 1.0
 */

$baseUrl = Yii::app()->baseUrl;
/**
 * include Js Files
 */
// Yii::app()->clientScript->registerCoreScript('jquery', CClientScript::POS_END);
// Yii::app()->clientScript->registerCoreScript('jquery.ui', CClientScript::POS_END);
// Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/bootstrap.js', CClientScript::POS_END);
// Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/default.js', CClientScript::POS_END);
/**
 * include Css Files
 */
// Yii::app()->clientScript->registerCssFile($baseUrl.'/css/bootstrap.css');
// Yii::app()->clientScript->registerCssFile($baseUrl.'/css/bootstrap-overload.css');
// Yii::app()->clientScript->registerCssFile($baseUrl.'/css/styles.css');
// Yii::app()->clientScript->registerCssFile($baseUrl.'/css/jquery-ui.css');

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?=$baseUrl?>/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?=$baseUrl?>/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=$baseUrl?>/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?=$baseUrl?>/css/ace.min.css" />
		<link rel="stylesheet" href="<?=$baseUrl?>/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?=$baseUrl?>/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<?php echo $content; ?>

</html>
