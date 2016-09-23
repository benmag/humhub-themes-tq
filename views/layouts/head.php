<?php 
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/licences GNU AGPL v3
 */
?>
<!--
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/licences GNU AGPL v3
 */
 -->
<?php $ver = 4 ?>

<!-- start: CSS -->
<link href="<?php echo $this->theme->getBaseUrl(); ?>/css/datepicker.css?ver=<?php echo $ver; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/css/theme.css?ver=<?php echo $ver; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/css/theme-tc.css?ver=<?php echo $ver; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/css/flatelements.css?ver=<?php echo $ver; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/font/lato/lato.css" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/font/openionic/style.css" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/css/theme-tc.css?ver=<?php echo $ver; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/js/owl-carousel/animate.css" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/js/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/js/scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl(); ?>/js/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
<!-- end: CSS -->

<!-- start: JavaScript -->
 <script type="text/javascript"
            src="<?php echo $this->theme->getBaseUrl(); ?>/js/respond.js"></script>
 <script type="text/javascript"
            src="<?php echo $this->theme->getBaseUrl(); ?>/js/animatescroll/animatescroll.min.js"></script>
 <script type="text/javascript"
            src="<?php echo $this->theme->getBaseUrl(); ?>/js/owl-carousel/owl.carousel.js"></script>
 <script type="text/javascript"
            src="<?php echo $this->theme->getBaseUrl(); ?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
 <script type="text/javascript"
            src="<?php echo $this->theme->getBaseUrl(); ?>/js/bootstrap-select/dist/js/bootstrap-select.js"></script>

 <script type="text/javascript"
        src="<?php echo $this->theme->getBaseUrl(); ?>/js/bootstrap-select/dist/js/bootstrap-select.js"></script>

<!--<script type="text/javascript">-->
<!--	// Initiate Bootstrap Tooltips-->
<!--	$(function () {-->
<!--	  $('[data-toggle="tooltip"]').tooltip()-->
<!--	})-->
<!--</script>-->
<!-- end: JavaScript -->

<script>
 var searchAjaxUrl = "<?= Yii::$app->urlManager->createUrl('//extend_search/search/index', array('mode'=>'quick', 'keyword'=>'-searchKeyword-')) ?>";
</script>
 <script type="text/javascript"
         src="<?php echo Yii::getAlias("@web/resources/search/") ?>/searchmenu.js"></script>
