<?php

use yii\helpers\Html;
use humhub\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle; ?></title>
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link href="<?php echo Yii::getAlias("@web"); ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo Yii::getAlias("@web"); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::getAlias("@web"); ?>/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo Yii::getAlias("@web"); ?>/css/style.css" rel="stylesheet">
    <link
        href="<?php echo Yii::getAlias("@web"); ?>/resources/font-awesome/css/font-awesome.min.css"
        rel="stylesheet">
    <link href="<?php echo Yii::getAlias("@web"); ?>/css/bootstrap-wysihtml5.css"
          rel="stylesheet">
    <link href="<?php echo Yii::getAlias("@web"); ?>/css/flatelements.css" rel="stylesheet">
    <!-- end: CSS -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::getAlias("@web"); ?>/js/html5shiv.js"></script>
    <link id="ie-style" href="<?php echo Yii::getAlias("@web"); ?>/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="<?php echo Yii::getAlias("@web"); ?>/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: JavaScript -->
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/ekko-lightbox-modified.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/modernizr.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.highlight.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.autosize.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.timeago.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/locales/jquery.timeago.<?php echo Yii::$app->language; ?>.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.knob.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/bootstrap3-wysihtml5.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.flatelements.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.placeholder.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.ui.widget.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.fileupload.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.color-2.1.0.min.js"></script>
            
         
    <!-- start: render additional head (css and js files) -->
    <?php $this->render('head'); ?>
    <!-- end: render additional head -->

    <!-- Global app functions -->
    <script type="text/javascript" src="<?php echo Yii::getAlias("@web"); ?>/js/app.js"></script>
    <!-- end: JavaScript -->

    <!-- start: Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->theme->baseUrl; ?>//ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->theme->baseUrl; ?>/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $this->theme->baseUrl; ?>/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->theme->baseUrl; ?>/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->theme->baseUrl; ?>/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->theme->baseUrl; ?>/ico/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- end: Favicon and Touch Icons -->


</head>

<body>
<?php
$user = Yii::$app->user->getIdentity();
$foo = $user->getSetting("enable_html5_desktop_notifications", 'core', \humhub\models\Setting::Get('enable_html5_desktop_notifications', 'notification'));

?>

<?php if ($foo) : ?>
    <script type="text/javascript" src="<?php echo Yii::getAlias("@web"); ?>/js/desktop-notify-min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::getAlias("@web"); ?>/js/desktop-notify-config.js"></script>
<?php endif; ?>

<!-- start: first top navigation bar -->
<div id="topbar-first" class="topbar">
    <div class="container">
        <div class="topbar-brand hidden-xs">
            <?php $this->widget('application.widgets.LogoWidget', array()); ?>
        </div>

        <div class="topbar-actions pull-right">
            <?php $this->widget('application.modules_core.user.widgets.AccountTopMenuWidget'); ?>
        </div>

        <div class="notifications pull-right">

            <span title="View your latest notifications">
            <!-- global notifications dropdown -->
            	<?php $this->widget('application.modules_core.notification.widgets.NotificationListWidget'); ?>
            </span>

			<span title="View your latest messages">
            <!-- Notification addon widget for modules -->
            	<?php $this->widget('application.widgets.NotificationAddonWidget', array('widgets' => array())); ?>
          	</span>

        </div>

    </div>

</div>
<!-- end: first top navigation bar -->


<!-- start: second top navigation bar -->
<div id="topbar-second" class="topbar">
    <div class="container">
        <ul class="nav ">
            <!-- load space chooser widget -->
            <?php $this->widget('application.modules_core.space.widgets.SpaceChooserWidget', array()); ?>

            <!-- load navigation from widget -->
            <?php $this->widget('application.widgets.TopMenuWidget', array()); ?>
        </ul>
     

        <ul class="nav pull-right" id="search-menu-nav" title="Search for posts and users in TeachConnect">
            <li class="dropdown">
                <a href="#" id="search-menu" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-search pull-left"></i> <span class="search-button">Search</span> 		
                </a>
                <ul class="dropdown-menu pull-right" id="search-menu-dropdown">
                    <?php
                    $this->widget('application.widgets.TopMenuRightStackWidget', array(
                        'widgets' => array(
                            array('application.modules.extend_search.widgets.SearchMenuWidget', array())
                        )
                    ));
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- end: second top navigation bar -->

<?php $this->widget('application.modules_core.tour.widgets.TourWidget', array()); ?>

<!-- start: show content (and check, if exists a sublayout -->
<?php if (isset($this->subLayout) && $this->subLayout != "") : ?>
    <?php echo $this->render($this->subLayout, array('content' => $content)); ?>
<?php else: ?>
    <?php echo $content; ?>
<?php endif; ?>
<!-- end: show content -->

<!-- start: Modal (every lightbox will/should use this construct to show content)-->
<div class="modal" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loader">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: Modal -->

<script type="text/javascript">
    // Replace the standard checkbox and radio buttons
    $('body').find(':checkbox, :radio').flatelements();
</script>

<?php echo HSetting::GetText('trackingHtmlCode'); ?>
</body>
</html>
