<?php

use humhub\modules\user\models\User;
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

?>
<?php foreach ($this->context->getItems() as $item) :

    $item['style'] = "";
	$item['title'] = "";
    // Apply custom (hardcoded) overwrites to menu items
    switch($item['label']) {
        case "Dashboard":
            $item['label'] = "All circles";
			$item['title'] = "title=\"Access your home dashboard news feed\"";
//            $item['style'] = "style=\"display:none !important; width:0;\"";
        break;

        case "Directory":
            $item['style'] = "style=\"display:none !important; width:0;\"";
        break;

		case "Messages":
            $item['title'] = "title=\"Access your message inbox\"";
            //$item['style'] = "style=\"display:none !important; width:0;\"";
        break;

		case "About":
			$item['title'] = "title=\"About the site and contact details\"";
            //$item['style'] = "style=\"display:none !important; width:0;\"";
        break;

		case "Knowledge":
            if((bool)\Yii::$app->user->identity->super_admin) {
                $item['title'] = "title=\"Ask for, find and discuss valuable teaching information\"";
                $item['class_style'] = "visible-lg visible-md";
            } else {
                $item['title'] = "title=\"Ask for, find and discuss valuable teaching information\"";
//                $item['class_style'] = (!LogicEntry::getStatusHomeOfUser()) ? "visible-lg visible-md " : "visible-xs visible-sm ";
            }
        break;

		case "Privacy Policy":
            $item['title'] = "title=\"TeachConnect privacy policy\"";
        break;
    }

    ?>

    <li class="visible-md visible-lg <?= isset($item['class_style'])?$item['class_style']:''?> <?php if ($item['isActive']): ?>active<?php endif; ?> <?php
    if (isset($item['id'])) {
        echo $item['id'];
    }
    ?>" <?php echo $item['style']; ?> <?php echo $item['title']; ?>>
            <?php echo \yii\helpers\Html::a($item['icon'] . "<br />" . $item['label'], $item['url'], $item['htmlOptions']); ?>
    </li>
<?php endforeach; ?>

<?php if(!LogicEntry::getStatusHomeOfUser() || (bool)\Yii::$app->user->identity->super_admin) { ?>
    <li class="dropdown">
        <a href="#" id="space-menu" class="dropdown-toggle" data-toggle="dropdown">
            <!-- start: Show space image and name if chosen -->
<!--            --><?php //if (LogicEntry::getCurrentSpace()) { ?>
<!--                --><?php //echo \humhub\modules\space\widgets\Image::widget([
//                    'space' => LogicEntry::getCurrentSpace(),
//                    'width' => 32,
//                    'htmlOptions' => [
//                        'class' => 'current-space-image',
//                    ]
//                ]); ?>
<!--            --><?php //} ?>

            <?php
                echo '<i class="fa fa-dot-circle-o"></i><br>' . Yii::t('SpaceModule.widgets_views_spaceChooser', 'Mentor circles');
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
                    <?php foreach (LogicEntry::getMembershipQuery() as $membership): ?>
                        <?php $newItems = $membership->countNewItems(); ?>
                        <li>
                            <a href="<?php echo $membership->space->getUrl(); ?>">
                                <div class="media">
                                    <!-- Show space image -->
                                    <?php echo \humhub\modules\space\widgets\Image::widget([
                                        'space' => $membership->space,
                                        'width' => 24,
                                        'htmlOptions' => [
                                            'class' => 'pull-left',
                                        ]
                                    ]); ?>
                                    <div class="media-body">
                                        <strong><?php echo Html::encode($membership->space->name); ?></strong>
                                        <?php if ($newItems != 0): ?>
                                            <div class="badge badge-space pull-right"
                                                 style="display:none"><?php echo $newItems; ?></div>
                                        <?php endif; ?>
                                        <br>

                                        <p><?php echo Html::encode(Helpers::truncateText($membership->space->description, 60)); ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </li>
            <?php if (LogicEntry::canCreateSpace() && (bool)\Yii::$app->user->identity->super_admin): ?>
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
     <script type="text/javascript">
        $(document).ready(function() {
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

<?php } else { ?>
    <?php if(!(bool)\Yii::$app->user->identity->super_admin) { ?>
        <?php foreach (\humhub\modules\space\models\Membership::GetUserSpaces() as $space) { ?>
            <li class="visible-md visible-lg visible-sm">
                <a class=" active" href="<?= $space->url ?>">
                    <i class="fa fa-dot-circle-o"></i><br>
                    <span class="">Mentor circle</span>
                </a>
            </li>
        <?php } ?>
    <?php } ?>
<?php } ?>

<li class="dropdown visible-xs visible-sm">
    <a href="#" id="top-dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-align-justify"></i><br>
        <?php echo Yii::t('base', 'Menu'); ?>
        <b class="caret"></b></a>
    <ul class="dropdown-menu pull-right">

        <?php if(isset(Yii::$app->params['currentSpace']) && !Yii::$app->params['currentSpace'] && LogicEntry::getStatusHomeOfUser() && !(bool)\Yii::$app->user->identity->super_admin) { ?>
            <?php foreach (\humhub\modules\space\models\Membership::GetUserSpaces(\Yii::$app->user->id) as $space) { ?>
                <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>">
                    <?php echo HHtml::link("Mentor circle", $space->url, ['class' => '']); ?>
                </li>
            <?php } ?>
        <?php } ?>
        <?php $remove = ["Dashboard", "Directory" , "Mentor circle", "Knowledge"]; ?>
        <?php foreach ($this->context->getItems() as $item) :
            $item['style'] = "";

            if(in_array($item['label'], $remove)) {
                $item['style'] = "hidden";
            }

            if((bool)\Yii::$app->user->identity->super_admin) {
                $item['style'] = '';
            } else {
                if (!LogicEntry::getStatusHomeOfUser()) {
                    $item['style'] = '';
                }
            }

            if((!LogicEntry::getStatusHomeOfUser())) {
                if ($item['label'] == "Dashboard") {
                    $item['style'] = "";
                    $item['label'] = 'All Circles';
                }
            }
            ?>

            <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>" <?php echo $item['style']; ?>>
                <?php echo Html::a($item['label'], $item['url'], $item['htmlOptions']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</li>
