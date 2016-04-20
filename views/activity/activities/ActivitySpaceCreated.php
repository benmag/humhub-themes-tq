<?php $this->beginContent('application.modules_core.activity.views.activityLayout', array('activity' => $activity)); ?>

<?php if ($workspace != null && !Yii::app()->controller instanceof ContentContainerController): ?>
    <?php echo Yii::t('ActivityModule.views_activities_ActivitySpaceCreated', "<i class=\"fa fa-dot-circle-o color-circle-mentorship\" style='margin-right: 5px;color: #f36229;vertical-align: middle;'></i> %displayName% created the new space %spaceName%", array(
        '%displayName%' => '<strong>'.CHtml::encode($user->displayName).'</strong>',
        '%spaceName%' => '<strong>'. CHtml::encode(Helpers::truncateText($workspace->name, 25)).'</strong>'
    )); ?>

<?php else: ?>
    <?php echo Yii::t('ActivityModule.views_activities_ActivitySpaceCreated', "%displayName% created this space.", array(
        '%displayName%' => '<strong>'.CHtml::encode($user->displayName).'</strong>'
    ));
    ?>
<?php endif; ?>

<?php $this->endContent(); ?>

