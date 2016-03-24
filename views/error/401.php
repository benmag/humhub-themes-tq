<?php
/* @var $this \yii\web\View */
?>
<div class="container container-error">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <?php echo Yii::t('error', "<strong>Login</strong> required"); ?>
        </div>
        <div class="panel-body">

            <strong><?php echo yii\helpers\Html::encode($message); ?></strong>

            <br />
            <hr>

            <?php echo yii\helpers\Html::a(Yii::t('base', 'Login'), Yii::$app->user->loginUrl , array('class' => 'btn btn-success')); ?>
            <a href="javascript:history.back();" class="btn btn-primary  pull-right"><?php echo Yii::t('base', 'Back'); ?></a>
        </div>
    </div>
</div>
