<?php

use yii\helpers\Html;
use humhub\libs\Helpers;
use humhub\modules\content\components\ContentContainerController;

$class_color = ($source->name == 'Welcome Space')?'color-circle-welcome':'color-circle-mentorship';

if (!Yii::$app->controller instanceof ContentContainerController) {
    echo Yii::t('ActivityModule.views_activities_ActivitySpaceCreated',"<i class='fa fa-dot-circle-o $class_color' style='margin-right: 5px;vertical-align: middle;'></i> " .  "%displayName% created the new space %spaceName%", array(
        '%displayName%' => '<strong>' . Html::encode($originator->displayName) . '</strong>',
        '%spaceName%' => '<strong>' . Html::encode(Helpers::truncateText($source->name, 25)) . '</strong>'
    ));
} else {
    echo Yii::t('ActivityModule.views_activities_ActivitySpaceCreated',"<i class='fa fa-dot-circle-o $class_color' style='margin-right: 5px;vertical-align: middle;'></i> " .  "%displayName% created this space.", array(
        '%displayName%' => '<strong>' . Html::encode($originator->displayName) . '</strong>'
    ));
}
?>
