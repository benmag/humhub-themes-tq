<?php
$this->pageTitle = $this->pageTitle . ' - ' . Yii::t('base', 'Error');
?>
<div class="container container-error">
    <div class="panel panel-default">
    	<img src="<?php echo $this->theme->getBaseUrl() . '/img/tc-flower.png' ?>">
        <div class="panel-heading">
            <?php echo Yii::t('base', "<strong>Oooops...</strong><br>"); ?> <?php echo Yii::t('base', "It looks like you may have<br> taken a wrong turn."); ?>
        </div>
        <div class="panel-body">

            <div class="error">
                <p><?php echo yii\helpers\Html::encode($message); ?></p>
            </div>

            <hr>
            <a href="<?php echo yii\helpers\Url::toRoute('//');?>" class="btn btn-primary"><?php echo Yii::t('base', 'Back to dashboard'); ?></a>
        </div>
    </div>
</div>