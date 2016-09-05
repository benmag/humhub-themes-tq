<?php
use yii\helpers\Html;
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Your email is not recognised as being from one of our site partners</strong> 
        </div>
        <div class="panel-body">
            
            <strong><?php echo Html::encode($message); ?></strong>
            
            <br />
            Have you tried joining TeachConnect using your institutional email address? This will typically be your email address that ends with ".edu.au". For example, if you're a pre-service teacher then this will be your university account.
            <br />
            <br />
            If you still can't log in and want to take part in TeachConnect then please do get in touch with us. Write to <a href="mailto:teachconnect@outlook.com">teachconnect@outlook.com</a> and let us know a bit about yourself - we'll get in touch with you soon.
            <br />
            <br />
            Thanks for your interest in TeachConnect!<br />
            
            <hr>
            <a href="javascript:history.back();" class="btn btn-primary  pull-right"><?php echo Yii::t('base', 'Back'); ?></a>
        </div>
    </div>
</div>