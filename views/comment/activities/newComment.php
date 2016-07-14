<?php

use yii\helpers\Html;

echo Yii::t('CommentModule.views_activities_CommentCreated', '<i class="fa fa-commenting-o color-qanda" style="margin-right: 5px;color: #fdc015;vertical-align: middle"></i>'."%displayName% new comment post ", array(
    '%displayName%' => '<strong>' . Html::encode($originator->displayName) . '</strong>'
));

echo ' "' . \humhub\widgets\RichText::widget(['text' => $source->message, 'minimal' => true, 'maxLength' => 100]) . '"';
?>