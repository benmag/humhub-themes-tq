<?php
/**
 * Overwrite the original Left Navigation by MenuWidget.
 * - Rename 'Space' to 'Circle'
 *
 * @package humhub.widgets
 * @since 0.5
 */
?>

<!-- start: list-group navi for large devices -->
<div class="panel panel-default">
    <?php foreach ($this->context->getItemGroups() as $group) :

        // Use 'circle' not 'space' in menu
        switch($group['label']) {
            case "<strong>Space</strong> menu":
                $group['label'] = "<strong>Circle</strong> menu";
            break;

            case "<strong>Space</strong> preferences":
                $group['label'] = "<strong>Circle</strong> preferences";
            break;
        }

        ?>

        <?php $items = $this->context->getItems($group['id']); ?>
        <?php if (count($items) == 0) continue; ?>

        <?php if ($group['label'] != "") : ?>
            <div class="panel-heading"><?php echo $group['label']; ?></div>
        <?php endif; ?>
        <div class="list-group">
            <?php foreach ($items as $item) : ?>
                <?php $item['htmlOptions']['class'] .= " list-group-item"; ?>
                <?php echo \yii\helpers\Html::a($item['icon']."<span>".$item['label']."</span>", $item['url'], $item['htmlOptions']); ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

</div>
<!-- end: list-group navi for large devices -->
