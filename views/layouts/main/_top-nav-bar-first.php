<div id="topbar-first" class="topbar">
    <div class="container">
        <div class="topbar-brand hidden-xs">
            <?php echo \humhub\widgets\SiteLogo::widget(); ?>
        </div>

        <div class="topbar-actions pull-right">
            <?php echo \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
        </div>

        <div class="notifications pull-right">

            <?php
            echo \humhub\widgets\NotificationArea::widget(['widgets' => [
                [\humhub\modules\notification\widgets\Overview::className(), [], ['sortOrder' => 10]],
            ]]);
            ?>

        </div>

    </div>

</div>