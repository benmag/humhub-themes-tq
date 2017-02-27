<?php

use humhub\modules\contrib\spacemembership\models\SpaceMembership;
use humhub\modules\content\models\WallEntry;
use humhub\modules\activity\models\Activity;
use humhub\modules\comment\models\Comment;
use yii\helpers\Html;
use humhub\modules\logicenter\models\LogicEntry;
use yii\helpers\Url;
use humhub\libs\Helpers;

$this->registerJsFile("@web/resources/space/spacechooser.js");
$this->registerJsVar('scSpaceListUrl', Url::to(['/space/list', 'ajax' => 1]));
?>

<?php
/**
 * Overwrite the original TopNavigation by TopMenuWidget.
 *  - Rename 'Dashboard' to 'Home'
 *  - Hide 'Directory'
 *
 * @source humhub.widgets
 * @since 0.5
 * @var $this \humhub\widgets\TopMenu
 */

if (!function_exists('countNewItems')) {
    function countNewItems($space, $membership, $since = "")
    {
        if (!$membership) {
            return 0;
        }
        $query = WallEntry::find()->joinWith('content');
        $query->where(['!=', 'content.object_model', Activity::className()]);
        $query->andWhere(['wall_entry.wall_id' => $space->wall_id]);
        $query->andWhere(['>', 'wall_entry.created_at', $membership->last_visit || $since]);
        $count = $query->count();

        $count += Comment::find()->where(['space_id' => $space->id])
            ->andWhere(['>', 'created_at', $membership->last_visit])->count();
        return $count;
    }
}

?>

<?php

$this->context->addItem(['label' => 'Circles', 'sortOrder' => 200]);

foreach ($this->context->items as &$item) {
    $item['style'] = "";
    $item['title'] = "";

    // Apply custom (hardcoded) overwrites to menu items
    switch ($item['label']) {
        case "Dashboard":
            $item['label'] = "My circles";
            $item['title'] = "title=\"Access your home dashboard news feed\"";
            $item['sortOrder'] = 100;
            break;
        case "Directory":
            $item['style'] = "style=\"display:none !important; width:0;\"";
            $item['sortOrder'] = 700;
            break;
        case "Messages":
            $item['title'] = "title=\"Access your message inbox\"";
            $item['sortOrder'] = 500;
            break;
        case "About":
            $item['title'] = "title=\"About the site and contact details\"";
            $item['sortOrder'] = 600;
            break;
        case "Live Chat":
            $item['sortOrder'] = 400;
            break;
        case "Knowledge":
            if ((bool)\Yii::$app->user->identity->super_admin) {
                $item['title'] = "title=\"Ask for, find and discuss valuable teaching information\"";
                $item['class_style'] = "visible-lg visible-md";
                $item['sortOrder'] = 300;
            } else {
                $item['title'] = "title=\"Ask for, find and discuss valuable teaching information\"";
                $item['sortOrder'] = 300;
            }
            break;
        case "Privacy Policy":
            $item['title'] = "title=\"TeachConnect privacy policy\"";
            $item['sortOrder'] = 800;
            break;
    }
}

$menuItems = $this->context->getItems(); ?>

<?php foreach ($menuItems as &$item):?>
<?php if ($item['label'] != 'Circles'): ?>
    <li class="visible-md visible-lg <?= isset($item['class_style']) ? $item['class_style'] : '' ?> <?php if ($item['isActive']): ?>active<?php endif; ?> <?php
    if (isset($item['id'])) {
        echo $item['id'];
    }
    ?>" <?php echo $item['style']; ?> <?php echo $item['title']; ?>>
        <?php echo \yii\helpers\Html::a($item['icon'] . "<br />" . $item['label'], $item['url'], $item['htmlOptions']); ?>
    </li>
<?php else: ?>
    <li class="dropdown">
        <a href="#" id="space-menu" class="dropdown-toggle" data-toggle="dropdown">
            <?php
            echo '<i class="fa fa-dot-circle-o"></i><br>' . Yii::t('SpaceModule.widgets_views_spaceChooser', 'Circles');
            ?>
            <!-- end: Show space image and name if chosen -->
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" id="space-menu-dropdown" style="padding-bottom: 10px; !important">
            <li>
                <form action="" class="dropdown-controls"><input type="text" id="space-menu-search"
                                                                 class="form-control"
                                                                 autocomplete="off"
                                                                 placeholder="<?php echo Yii::t('SpaceModule.widgets_views_spaceChooser', 'Search'); ?>">

                    <div class="search-reset" id="space-search-reset"><i
                                class="fa fa-times-circle"></i></div>
                </form>
            </li>
            <li class="divider"></li>
            <li>
                <ul class="media-list notLoaded" id="space-menu-spaces">
                    <?php

                    $source = SpaceMembership::GetUserSpacesForMember(Yii::$app->user->id, Yii::$app->user->identity->super_admin);

                    foreach ($source as $entry) : ?>
                    <?php
                        $space = $entry[0];
                        $membership = $entry[1];
                        $newItems = countNewItems($space, $membership);
                        ?>
                        <li>
                            <a href="<?php echo $space->getUrl(); ?>">
                                <div class="media">
                                    <!-- Show space image -->
                                    <?php echo \humhub\modules\space\widgets\Image::widget([
                                        'space' => $space,
                                        'width' => 24,
                                        'htmlOptions' => [
                                            'class' => 'pull-left',
                                        ]
                                    ]); ?>
                                    <div class="media-body">
                                        <strong><?php echo Html::encode($space->name); ?></strong>
                                        <?php if ($newItems != 0) : ?>
                                            <div class="badge badge-space pull-right"
                                                 style="display:none"><?php echo $newItems; ?></div>
                                        <?php endif; ?>
                                        <br>

                                        <p><?php echo Html::encode(Helpers::truncateText(html_entity_decode(strip_tags($space->description)), 60)); ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php if (LogicEntry::canCreateSpace() && (bool)\Yii::$app->user->identity->super_admin) : ?>
                <li>
                    <div class="dropdown-footer">
                        <?php
                        echo Html::a(Yii::t('SpaceModule.widgets_views_spaceChooser', 'Create new space'), Url::toRoute(['/space/create/create']), array('class' => 'btn btn-info col-md-12', 'data-target' => '#globalModal'));
                        ?>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php endforeach; ?>


<script type="text/javascript">
    $(document).ready(function () {
        // set niceScroll to SpaceChooser menu
        $("#space-menu-spaces").niceScroll({
            cursorwidth: "7",
            cursorborder: "",
            cursorcolor: "#555",
            cursoropacitymax: "0.2",
            railpadding: {top: 0, right: 3, left: 0, bottom: 0}
        });

        $('.badge-space').fadeIn('slow');
    })
</script>

<li class="dropdown visible-xs visible-sm">
    <a href="#" id="top-dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-align-justify"></i><br>
        <?php echo Yii::t('base', 'Menu'); ?>
        <b class="caret"></b></a>
    <ul class="dropdown-menu pull-right">

        <?php if (isset(Yii::$app->params['currentSpace']) && !Yii::$app->params['currentSpace'] && !(bool)\Yii::$app->user->identity->super_admin) { ?>
            <?php foreach (SpaceMembership::GetUserSpacesForMember(\Yii::$app->user->id) as $space) { ?>
                <li class="<?php if ($item['isActive']) : ?>active<?php endif; ?>">
                    <?php echo Html::link("Mentor circle", $space->url, ['class' => '']); ?>
                </li>
            <?php } ?>
        <?php } ?>
        <?php $remove = [
                "Directory" => 1,
                "Mentor circle" => 1,
        ]; ?>
        <?php foreach ($this->context->items as &$item) :
            if (isset($remove[$item['label']])) {
                continue;
            }
            if ($item['label'] == "Dashboard") {
                    $item['label'] = 'My Circles';

            }
            ?>

            <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>">
                <?php echo Html::a($item['label'], $item['url'], $item['htmlOptions']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</li>
<script>
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
        modal_this = this
        $(document).on('focusin.modal', function (e) {
            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus()
            }
        })
    };
</script>
