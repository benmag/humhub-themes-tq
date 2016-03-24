<?php
/**
 * Shows a "post to space" select
 * box when the criteria is met.
 *
 * Criteria = if they're not looking
 * at a Space or a User and they are
 * a member in more than one space.
 *
 * Later on (in views/wall/widgets/contentForm.php)
 * we set up a listener on #post_to_space which updates
 * the fields that tell Humhub where the post is
 * originating from.
 */
use yii\helpers\Html;
?>

<?php
$userSpaces = \humhub\modules\space\models\Membership::GetUserSpaces();

if(count($userSpaces) > 1 && Yii::$app->request->get('sguid') == null && Yii::$app->request->get('uguid') == null) {
    $showSpacePicker = true;
} else {
    $showSpacePicker = false;
}
?>

<div <?php if(!$showSpacePicker) echo "style='display:none !important;'"; ?>>
    <select id="post_to_space" class="btn-group selectpicker show-tick form-control" <?php if(!$showSpacePicker) echo "style='display:none !important;'"; ?>>
        <?php echo($showSpacePicker ? "<option value=\"\">Choose a circle</option>" : ""); ?>
        <?php foreach($userSpaces as $space) { ?>
            <option value="<?php echo $space->guid; ?>"><?php echo $space->name; ?></option>
        <?php } ?>
    </select>
</div>


<?php echo Html::textArea("message", '', array('id' => 'contentForm_message', 'class' => 'form-control autosize contentForm', 'rows' => '1', 'placeholder' => Yii::t("PostModule.widgets_views_postForm", "What's on your mind?"))); ?>

<?php
/* Modify textarea for mention input */
echo \humhub\widgets\RichTextEditor::widget(array(
    'id' => 'contentForm_message',
));
?>
