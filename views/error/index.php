<?php
$this->pageTitle = Yii::$app->name . ' - ' . Yii::t('base', 'Error');
use Yii;
use yii\helpers\Html;
?>
<div class="container container-error">
    <div class="panel panel-default">
    	<img src="<?php echo \yii\helpers\BaseUrl::base(); ?>/img/tc-flower.png">
        <div class="panel-heading">
            <?php echo Yii::t('base', "<strong>Oooops...</strong><br>"); ?> <?php echo Yii::t('base', "It looks like you may have<br> taken a wrong turn."); ?>
        </div>
        <div class="panel-body">

            <div class="error">
                <p><?php echo Html::encode($message); ?></p>
            </div>

            <hr>
            <a href="<?php echo Yii::$app->urlManager->createUrl('/')?>" class="btn btn-primary"><?php echo (!Yii::$app->user->isGuest)?Yii::t('base', 'Back to dashboard'):Yii::t('base', 'Back to home'); ?></a>
        </div>
    </div>
</div>