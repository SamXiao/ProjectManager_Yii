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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body><?php echo $content; ?></body>

</html>
