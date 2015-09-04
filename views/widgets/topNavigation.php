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

    switch($item['label']) {
        case "Dashboard":
            $item['label'] = "Home";
        break;

        case "Directory":
            $item['style'] = "style=\"display:none !important; width:0;\"";
        break;
    }

    ?>

    <li class="visible-md visible-lg <?php if ($item['isActive']): ?>active<?php endif; ?> <?php
    if (isset($item['id'])) {
        echo $item['id'];
    }
    ?>" <?php echo $item['style']; ?>>
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
