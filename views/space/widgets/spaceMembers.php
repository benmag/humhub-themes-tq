<?php if ($space->isAdmin() && count($space->applicants) != 0) : ?>
    <div class="panel panel-danger">

        <div class="panel-heading"><?php echo Yii::t('SpaceModule.widgets_views_spaceMembers', '<strong>New</strong> member request'); ?></div>

        <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <?php $user_count = 0; ?>
                <?php foreach ($space->applicants as $membership) : ?>
                    <?php $user = $membership->user; ?>
                    <?php if ($user == null) continue; ?>
                    <tr>
                        <td align="left" valign="top" width="30">
                            <a class="profile-size-xs pull-left" href="<?php echo $user->profileUrl; ?>" alt="<?php echo CHtml::encode($user->displayName) ?>">
                                <img class="img-rounded profile-size-xs tt img_margin"
                                     src="<?php echo $user->getProfileImage()->getUrl(); ?>" height="24" width="24"
                                     alt="24x24" data-src="holder.js/24x24" style="width: 24px; height: 24px;"
                                     data-toggle="tooltip" data-placement="top" title=""
                                     data-original-title="<strong><?php echo CHtml::encode($user->displayName); ?></strong><br><?php echo CHtml::encode($user->profile->title); ?>"/>
                                     <div class="profile-overlay-img profile-overlay-img-xs tt" data-toggle="tooltip" data-placement="top" title=""
                                     data-original-title="<strong><?php echo CHtml::encode($user->displayName); ?></strong><br><?php echo CHtml::encode($user->profile->title); ?>"></div>
                            </a>


                        </td>

                        <td align="left" valign="top">
                            <strong><?php echo CHtml::encode($user->displayName) ?></strong><br>
                            <?php echo CHtml::encode($membership->request_message); ?><br>

                            <hr>
                            <?php echo HHtml::postLink('Accept', $this->createUrl('//space/admin/membersApproveApplicant', array('sguid' => $space->guid, 'userGuid' => $user->guid, 'approve' => true)), array('class' => 'btn btn-success btn-sm', 'id' => 'user_accept_' . $user->guid)); ?>
                            <?php echo HHtml::postLink('Decline', $this->createUrl('//space/admin/membersRejectApplicant', array('sguid' => $space->guid, 'userGuid' => $user->guid, 'reject' => true)), array('class' => 'btn btn-danger btn-sm', 'id' => 'user_decline_' . $user->guid)); ?>

                        </td>
                    </tr>
                    <?php if ($user_count < count($space->applicants) - 1) { ?>
                        <hr>
                    <?php } ?>
                    <?php
                    $user_count++;
                endforeach;
                ?>
            </table>
        </div>

    </div>
<?php endif; ?>

<div class="panel panel-default members" id="space-members-panel">

    <!-- Display panel menu widget -->
    <?php $this->widget('application.widgets.PanelMenuWidget', array('id' => 'space-members-panel')); ?>

    <div class="panel-heading"><?php echo Yii::t('SpaceModule.widgets_views_spaceMembers', '<strong>Circle</strong> members'); ?></div>
    <div class="panel-body">
        <?php if (count($space->membershipsLimited) != 0) : ?>
            <?php $ix = 0; ?>
            <?php foreach ($space->membershipsLimited as $membership) : ?>
                <?php $user = User::model()->findByPk($membership->user_id); ?>
                <?php if ($user == null || $user->status != User::STATUS_ENABLED) continue; ?>
                <?php if ($ix > 23) break; ?>
                <?php $ix++; ?>
        
                <a class="profile-size-xs pull-left" href="<?php echo $user->getProfileUrl(); ?>">
                    <img src="<?php echo $user->getProfileImage()->getUrl(); ?>" class="img-rounded profile-size-xs tt img_margin" alt="24x24" data-src="holder.js/32x32"
                         data-toggle="tooltip" data-placement="top" data-html="true" title=""
                         data-original-title="<strong><?php echo CHtml::encode($user->displayName); ?></strong><br><small><?php echo CHtml::encode($user->profile->title); ?></small>">
                   	<div class="profile-overlay-img profile-overlay-img-xs tt" data-toggle="tooltip" data-placement="top" data-html="true" title=""
                         data-original-title="<strong><?php echo CHtml::encode($user->displayName); ?></strong><br><small><?php echo CHtml::encode($user->profile->title); ?></small>"></div>
                </a>

                <?php if ($space->isAdmin($user->id)) { ?>
                    <!-- output, if user is admin of this space -->
                <?php } ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>