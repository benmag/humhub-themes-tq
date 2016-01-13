<?php
/**
 * Overwrite the original TopNavigation by TopMenuWidget.
 *  - Rename 'Dashboard' to 'Home'
 *  - Hide 'Directory'
 *
 * @source humhub.widgets
 * @since 0.5 */
?>

<?php

use yii\helpers\Html;
?>
<?php foreach ($this->context->getItems() as $item) : ?>
    <li class="visible-md visible-lg <?php if ($item['isActive']): ?>active<?php endif; ?> <?php
    if (isset($item['id'])) {
        echo $item['id'];
    }
    ?>">
        <?php
        switch($item['label']){
            case 'Directory':
                // Do nothing, because we don't want to show Directory  
                break;

            case 'Dashboard':
                echo Html::a($item['icon'] . "<br />" . 'Home', $item['url'], $item['htmlOptions']);
                break;

            default:
                echo Html::a($item['icon'] . "<br />" . $item['label'], $item['url'], $item['htmlOptions']);
        }
        ?>
    </li>
<?php endforeach; ?>

<li class="dropdown visible-xs visible-sm">
    <a href="#" id="top-dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-align-justify"></i><br>
        <?php echo Yii::t('base', 'Menu'); ?>
        <b class="caret"></b></a>
    <ul class="dropdown-menu">

        <?php foreach ($this->context->getItems() as $item) : ?>
            <li class="<?php if ($item['isActive']): ?>active<?php endif; ?>">
                <?php
                switch($item['label']){
                    case 'Directory':
                        // Do nothing, because we don't want to show Directory
                        break;

                    case 'Dashboard':
                        echo Html::a('Home', $item['url'], $item['htmlOptions']);
                        break;

                    default:
                        echo Html::a($item['label'], $item['url'], $item['htmlOptions']);
                }
                ?>
            </li>
        <?php endforeach; ?>

    </ul>
</li>
