<?php

use yii\helpers\Html;

$class_color = ($originator->displayName == 'Welcome Space')?'color-circle-welcome':'color-circle-mentorship';

echo Yii::t('ContentModule.activities_views_created', "<i class='fa fa-dot-circle-o $class_color' style='margin-right: 5px;vertical-align: middle;'></i>" . '{displayName} created a new {contentTitle}.', array(
    '{displayName}' => '<strong>' . Html::encode($originator->displayName) . '</strong>',
    '{contentTitle}' => $this->context->getContentInfo($source)
));
?>