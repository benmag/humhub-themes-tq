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
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::getAlias(" @web"); ?>/js/html5shiv.js"></script>
        <
        link
        id = "ie-style"
        href = "<?php echo Yii::getAlias("
        @
        web
        "); ?>/css/ie.css"
        rel = "stylesheet" >
        <![endif]-->

        <!--[if IE 9]>
        <link id="ie9style" href="<?php echo Yii::getAlias(" @web"); ?>/css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: render additional head (css and js files) -->
        <?php echo $this->render('head'); ?>
        <!-- end: render additional head -->


        <!-- start: Favicon and Touch Icons -->
        <?php echo $this->render('main\_favicon-touchicons'); ?>
        <!-- end: Favicon and Touch Icons -->

    </head>

    <body>
    <?php $this->beginBody() ?>

    <!-- start: first top navigation bar -->
    <?php echo $this->render('main\_top-nav-bar-first'); ?>
    <!-- end: first top navigation bar -->

    <!-- start: second top navigation bar -->
    <?php echo $this->render('main\_top-nav-bar-second'); ?>
    <!-- end: second top navigation bar -->

    <?php echo \humhub\modules\tour\widgets\Tour::widget(); ?>

    <!-- start: show content (and check, if exists a sublayout -->
    <?php if (isset($this->context->subLayout) && $this->context->subLayout != "") : ?>
        <?php echo $this->render($this->context->subLayout, array('content' => $content)); ?>
    <?php else: ?>
        <?php echo $content; ?>
    <?php endif; ?>
    <!-- end: show content -->

    <!-- start: Modal (every lightbox will/should use this construct to show content)-->
    <?php echo $this->render('main\_global-modal'); ?>
    <!-- end: Modal -->

    <!-- start: Flatelement replacement -->
    <script type="text/javascript">
        // Replace the standard checkbox and radio buttons
        $('body').find(':checkbox, :radio').flatelements();
    </script>
    <!-- end: Flatelements -->

    <?php echo \humhub\models\Setting::GetText('trackingHtmlCode'); ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>