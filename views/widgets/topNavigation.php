<?php
/**
 * Overwrite the original TopNavigation by TopMenuWidget.
 *  - Rename 'Dashboard' to 'Home'
 *  - Hide 'Directory'
 *
 * @source humhub.widgets
 * @since 0.5 */
?>
<?php foreach ($this->getItems() as $item) :

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
            $item['title'] = "title=\"Ask for, find and discuss valuable teaching information\"";
            $item['class_style'] = " visible-xs visible-sm ";
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
            <?php echo HHtml::link($item['icon'] . "<br />" . $item['label'], $item['url'], $item['htmlOptions']); ?>
    </li>
<?php endforeach; ?>

<?php if(!LogicEntry::getStatusHomeOfUser() || (bool)User::model()->findByPk(Yii::app()->user->id)->super_admin) { ?>
    <li class="dropdown" title="Access your private mentorship circles">

        <a href="#" id="space-menu" class="dropdown-toggle" data-toggle="dropdown">
            <!-- start: Show space image and name if chosen -->

            <?php
            //            if (Yii::app()->params['currentSpace']) {
            //            } else {
            echo '<i class="fa fa-dot-circle-o"></i><br>' . Yii::t('SpaceModule.widgets_views_spaceChooser', 'Mentor circles');
            //            }
            ?>
            <!-- end: Show space image and name if chosen -->
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" id="space-menu-dropdown">
            <li>
                <form action="" class="dropdown-controls"><input type="text" id="space-menu-search"
                                                                 class="form-control"
                                                                 autocomplete="off"
                                                                 placeholder="<?php echo Yii::t('SpaceModule.widgets_views_spaceChooser','Search'); ?>">

                    <div class="search-reset" id="space-search-reset"><i
                            class="fa fa-times-circle"></i></div>
                </form>
            </li>

            <li class="divider"></li>
            <li>
                <ul class="media-list notLoaded" id="space-menu-spaces">
                    <li id="loader_spaces">
                        <div class="loader">
                            <div class="sk-spinner sk-spinner-three-bounce">
                                <div class="sk-bounce1"></div>
                                <div class="sk-bounce2"></div>
                                <div class="sk-bounce3"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <?php if (Yii::app()->user->canCreateSpace() && (bool)User::model()->findByPk(Yii::app()->user->id)->super_admin): ?>
                <li>
                    <div class="dropdown-footer">
                        <?php
                        echo CHtml::link(Yii::t('SpaceModule.widgets_views_spaceChooser', 'Create new space'), $this->createUrl('//space/create/create'), array('class' => 'btn btn-info col-md-12', 'data-toggle' => 'modal', 'data-target' => '#globalModal'));
                        ?>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </li>
    <script type="text/javascript">

        // set niceScroll to SpaceChooser menu
        $("#space-menu-spaces").niceScroll({
            cursorwidth: "7",
            cursorborder: "",
            cursorcolor: "#555",
            cursoropacitymax: "0.2",
            railpadding: {top: 0, right: 3, left: 0, bottom: 0}
        });

    </script>

<?php } else { ?>
    <?php if(!(bool)User::model()->findByPk(Yii::app()->user->id)->super_admin) { ?>
        <?php foreach (SpaceMembership::GetUserSpaces(Yii::app()->user->id) as $space) { ?>
            <li class="visible-md visible-lg">
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

        <?php if(!Yii::app()->params['currentSpace'] && LogicEntry::getStatusHomeOfUser() && !(bool)User::model()->findByPk(Yii::app()->user->id)->super_admin) { ?>
            <?php foreach (SpaceMembership::GetUserSpaces(Yii::app()->user->id) as $space) { ?>
                <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>">
                    <?php echo HHtml::link("Mentor circle", $space->url, ['class' => '']); ?>
                </li>
            <?php } ?>
        <?php } ?>
        <?php $remove = ["Dashboard", "Directory" , "Mentor circle", "Knowledge"]; ?>
        <?php foreach ($this->getItems() as $item) :
            $item['style'] = "";

            if(in_array($item['label'], $remove)) {
                $item['style'] = "hidden";
            }

            if((!LogicEntry::getStatusHomeOfUser())) {
                if ($item['label'] == "Dashboard") {
                    $item['style'] = "";
                    $item['label'] = 'All Circles';
                }
            }
            ?>

            <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>" <?php echo $item['style']; ?>>
                <?php echo HHtml::link($item['label'], $item['url'], $item['htmlOptions']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</li>
