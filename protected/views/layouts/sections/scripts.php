<?php $assestUrl = Yii::app()->baseUrl;?>
<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
	window.jQuery || document.write("<script src='<?=$assestUrl?>/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?=$assestUrl?>/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
	if("ontouchend" in document) document.write("<script src='<?=$assestUrl?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?=$assestUrl?>/js/bootstrap.min.js"></script>
<script src="<?=$assestUrl?>/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="<?=$assestUrl?>/js/excanvas.min.js"></script>
<![endif]-->

<script src="<?=$assestUrl?>/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?=$assestUrl?>/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?=$assestUrl?>/js/jquery.slimscroll.min.js"></script>
<script src="<?=$assestUrl?>/js/jquery.easy-pie-chart.min.js"></script>
<script src="<?=$assestUrl?>/js/jquery.sparkline.min.js"></script>
<script src="<?=$assestUrl?>/js/flot/jquery.flot.min.js"></script>
<script src="<?=$assestUrl?>/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?=$assestUrl?>/js/flot/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->

<script src="<?=$assestUrl?>/js/ace-elements.min.js"></script>
<script src="<?=$assestUrl?>/js/ace.min.js"></script>