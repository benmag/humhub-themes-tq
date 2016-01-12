<!-- start: CSS/Font -->
<link href="<?php echo $this->theme->getBaseUrl() . '/css/theme.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/font/open_sans/open-sans.css'; ?>" rel="stylesheet">

<link href="<?php echo $this->theme->getBaseUrl() . '/css/datepicker.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/css/theme.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/css/flatelements.css'; ?>" rel="stylesheet">

<link href="<?php echo $this->theme->getBaseUrl() . '/font/lato/lato.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/font/openionic/style.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/font/open_sans/open-sans.css'; ?>" rel="stylesheet">

<link href="<?php echo $this->theme->getBaseUrl() . '/css/theme-tc.css'; ?>" rel="stylesheet">

<link href="<?php echo $this->theme->getBaseUrl() . '/js/owl-carousel/animate.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/js/owl-carousel/assets/owl.carousel.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/js/scrollbar/jquery.mCustomScrollbar.min.css'; ?>" rel="stylesheet">
<link href="<?php echo $this->theme->getBaseUrl() . '/js/bootstrap-select/dist/css/bootstrap-select.css'; ?>" rel="stylesheet">
<!-- end: CSS/Font -->

<!-- start: JS file imports -->
<?php
$this->registerJsFile($this->theme->getBaseUrl() . '/js/respond.js');
$this->registerJsFile($this->theme->getBaseUrl() . '/js/animatescroll/animatescroll.min.js');
$this->registerJsFile($this->theme->getBaseUrl() . '/js/owl-carousel/owl.carousel.js');
$this->registerJsFile($this->theme->getBaseUrl() . '/js/scrollbar/jquery.mCustomScrollbar.concat.min.js');
$this->registerJsFile($this->theme->getBaseUrl() . '/js/bootstrap-select/dist/js/bootstrap-select.js');
?>
<!-- end: JS file imports -->

<!-- start: JS inline scripts
This is taken straight out of the Yii Handbook
-->
<?php
$js = <<< 'SCRIPT'
/* To initialize BS3 tooltips set this below */
$(function () {
    $("[data-toggle='tooltip']").tooltip();
});;
/* To initialize BS3 popovers set this below */
$(function () {
    $("[data-toggle='popover']").popover();
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);
?>
<!-- end: JS inline scripts -->