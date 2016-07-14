<?php

use yii\helpers\Html;

echo Yii::t('ActivityModule.views_activities_ActivityUserFollowsUser', '<i class="fa fa-users" style="margin-right: 5px;color: #1895a4;vertical-align: middle;"></i> {user1} now follows {user2}.', array(
    '{user1}' => '<strong>' .Html::encode($originator->displayName). '</strong>',
    '{user2}' => '<strong>' . Html::encode($source->getTarget()->displayName) . '</strong>',
));

?>
