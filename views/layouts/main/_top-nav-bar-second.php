<div id="topbar-second" class="topbar">
    <div class="container">
        <ul class="nav ">
            <!-- load space chooser widget -->
            <?php echo \humhub\modules\space\widgets\Chooser::widget(); ?>

            <!-- load navigation from widget -->
            <?php echo \humhub\widgets\TopMenu::widget(); ?>
        </ul>

        <ul class="nav pull-right" id="search-menu-nav">
            <?php echo \humhub\widgets\TopMenuRightStack::widget(); ?>
        </ul>
    </div>
</div>