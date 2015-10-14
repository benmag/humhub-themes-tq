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
            $item['label'] = "Home";
			$item['title'] = "title=\"Access your home dashboard news feed\"";
        break;

        case "Directory":
            $item['style'] = "style=\"display:none !important; width:0;\"";
        break;
		
		case "Messages":
            $item['title'] = "title=\"Access your message inbox\"";
        break;
		
		case "Q&A":
            $item['title'] = "title=\"Ask for, find and discuss valuable teaching information\"";
        break;
    }

    ?>

    <li class="visible-md visible-lg <?php if ($item['isActive']): ?>active<?php endif; ?> <?php
    if (isset($item['id'])) {
        echo $item['id'];
    }
    ?>" <?php echo $item['style']; ?> <?php echo $item['title']; ?>>
            <?php echo HHtml::link($item['icon'] . "<br />" . $item['label'], $item['url'], $item['htmlOptions']); ?>
    </li>
<?php endforeach; ?>

<li class="dropdown visible-xs visible-sm">
    <a href="#" id="top-dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-align-justify"></i><br>
        <?php echo Yii::t('base', 'Menu'); ?>
        <b class="caret"></b></a>
    <ul class="dropdown-menu pull-right">

        <?php foreach ($this->getItems() as $item) : 
            $item['style'] = "";

            if($item['label'] == "Dashboard") {
                $item['label'] = "Home";
            } else if($item['label'] == "Directory") {
                $item['style'] = "hidden";
            } 
            ?>

            <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>" <?php echo $item['style']; ?>>
                <?php echo HHtml::link($item['label'], $item['url'], $item['htmlOptions']); ?>
            </li>
        <?php endforeach; ?>

    </ul>
</li>
