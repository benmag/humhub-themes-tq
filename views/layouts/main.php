<?php 
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/licences GNU AGPL v3
 */
?>
<?php

use yii\helpers\Html;
use humhub\models\Setting;
use humhub\assets\TeachConnectAsset;
TeachConnectAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title><?php echo Html::encode($this->pageTitle); ?></title>
    <!-- end: Meta -->
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end: Mobile Specific -->
    <script type="text/javascript" src="<?php echo Yii::getAlias("@web"); ?>/js/jquery.min.js"></script>
    <!-- end: Mobile Specific -->
    <?= Html::csrfMetaTags() ?>
    <script src="<?php echo Yii::getAlias("@web"); ?>/js/html5shiv.js"></script>
    <?php $this->head() ?>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::getAlias("@web"); ?>/js/html5shiv.js"></script>
    <link id = "ie-style" href = "<?php echo Yii::getAlias('@web'); ?>/css/ie.css" rel = "stylesheet" >
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="<?php echo Yii::getAlias('@web'); ?>/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: render additional head (css and js files) -->
    <?php echo $this->render('head'); ?>
    <!-- end: render additional head -->


    <!-- start: Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo Yii::getAlias("@web"); ?>/ico/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="<?= Yii::$app->charset ?>">
    <!-- end: Favicon and Touch Icons -->
</head>

<body>
<?php $this->beginBody() ?>

<?= \humhub\modules\chat\widgets\MyTasksWidget::widget(); ?>

<!-- start: first top navigation bar -->
<div id="topbar-first" class="topbar">
    <div class="container">
        <div class="topbar-brand hidden-xs">
            <?php echo \humhub\widgets\SiteLogo::widget(); ?>
        </div>

        <div class="topbar-actions pull-right">
            <?php echo \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
        </div>

        <div class="notifications pull-right">

            <span title="View your latest notifications">
            <!-- global notifications dropdown -->
                <?php echo \humhub\modules\notification\widgets\Overview::widget(); ?>
            </span>

			<span title="View your latest messages">
            <!-- Notification addon widget for modules -->
                <?php echo \humhub\widgets\NotificationArea::widget(); ?>
          	</span>

        </div>

    </div>

</div>
<!-- end: first top navigation bar -->

<?php if(!\Yii::$app->user->isGuest) { ?>
    <!-- start: second top navigation bar -->
    <div id="topbar-second" class="topbar">
        <div class="container">
            <ul class="nav ">
                <!-- load space chooser widget -->
    <!--            --><?php //echo \humhub\modules\space\widgets\Chooser::widget(); ?>

                <!-- load navigation from widget -->
                <?php echo \humhub\widgets\TopMenu::widget(); ?>
            </ul>


            <ul class="nav pull-right" id="search-menu-nav" title="Search for posts and users in TeachConnect">
                <li class="dropdown">
                    <a href="#" id="search-menu" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-search pull-left"></i> <span class="search-button">Search</span>
                    </a>
                    <ul class="dropdown-menu pull-right" id="search-menu-dropdown">
                        <?php echo \humhub\modules\extend_search\widgets\SearchMenuWidget::widget(); ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- end: second top navigation bar -->
<?php } ?>

<?//= \humhub\modules\tour\widgets\Tour::widget();  ?>
<?= \humhub\modules\questionanswer\widgets\KnowledgeTourWidget::widget();  ?>

<!-- start: show content (and check, if exists a sublayout -->
<?php if (isset($this->context->subLayout) && $this->context->subLayout != "") : ?>
    <?php echo $this->render($this->context->subLayout, array('content' => $content)); ?>
<?php else: ?>
    <?php echo $content; ?>
<?php endif; ?>
<!-- end: show content -->

<!-- start: Modal (every lightbox will/should use this construct to show content)-->
<div class="modal" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php echo \humhub\widgets\LoaderWidget::widget(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end: Modal -->

<script type="text/javascript">
    // Replace the standard checkbox and radio buttons
    $('body').find(':checkbox, :radio').flatelements();
</script>

<?php echo Setting::GetText('trackingHtmlCode'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
