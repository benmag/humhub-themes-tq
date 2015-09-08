<script type="text/javascript">

    var gotoProfile = false;

    // Create a new tour
    var spacesTour = new Tour({
        storage: false,
        template: '<div class="popover tour"> <div class="arrow"></div> <h3 class="popover-title"></h3> <div class="popover-content"></div> <div class="popover-navigation"> <div class="btn-group"> <button class="btn btn-sm btn-default" data-role="prev"><?php echo Yii::t('TourModule.base', '« Prev'); ?></button> <button class="btn btn-sm btn-default" data-role="next"><?php echo Yii::t('TourModule.base', 'Next »'); ?></button>  </div> <button class="btn btn-sm btn-default" data-role="end"><?php echo Yii::t('TourModule.base', 'End guide'); ?></button> </div> </div>',
        name: 'circles',
        onEnd: function (tour) {
            tourCompleted();
        }
    });


    // Add tour steps
    spacesTour.addSteps([
        {
            orphan: true,
            backdrop: true,
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', '<strong>Mentorship circle</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', "Inside your mentorship circle you can discuss teaching practice, knowing that it's a private space. Mentor teachers are a part of the group to add their years of experience to the mix.")); ?>
        },
        {
            element: "#contentFormBody",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', '<strong>Writing</strong> posts')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', 'New posts can be written and posted here.')); ?>,
            placement: "bottom"
        },
        {
            element: ".wall-entry:eq(0)",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', '<strong>Posts</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', 'Yours, and other circle members\' posts will appear here.<br><br>These can then be liked or commented on.')); ?>,
            placement: "bottom"
        },
        {
            element: ".panel-activities",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', '<strong>Most recent</strong> activities')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', 'To keep you up to date, other members\' most recent activities in this circle will be displayed here.')); ?>,
            placement: "left"
        },
        {
            element: "#space-members-panel",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', '<strong>Mentorship circle</strong> members')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', 'The members of this circle will be displayed here.')); ?>,
            placement: "left"
        },
        {
            orphan: true,
            backdrop: true,
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', '<strong>Yay! You\'re done.</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_spaces', "That's it for the mentorship circle guide.<br><br>To carry on with the user profile guide, click here: ")); ?> + "<a href='javascript:gotoProfile = true; tourCompleted();'><?php echo Yii::t("TourModule.widgets_views_guide_spaces", "<strong>Profile Guide</strong>"); ?></a><br><br>"
        }
    ]);

    // Initialize tour plugin
    spacesTour.init();

    // start the tour
    spacesTour.restart();


    /**
     * Set tour as seen
     */
    function tourCompleted() {
        // load user spaces
        $.ajax({
            'url': '<?php echo Yii::app()->createAbsoluteUrl('//tour/tour/tourCompleted', array('section' => 'spaces')); ?>',
            'cache': false,
            'data': jQuery(this).parents("form").serialize()
        }).done(function () {

            if (gotoProfile == true) {
                // redirect to profile
                window.location.href="<?php echo Yii::app()->createUrl('//user/profile', array('uguid' => Yii::app()->user->guid,'tour' => 'true')); ?>";
            } else {
                // redirect to dashboard
                window.location.href="<?php echo Yii::app()->createUrl('//dashboard/dashboard'); ?>";
            }

        });
    }

</script>