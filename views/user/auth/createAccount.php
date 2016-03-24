<?php
use yii\helpers\Url;

if(Yii::$app->hasModule('anon_accounts')) {
    Yii::$app->getResponse()->redirect(Url::toRoute(['//anon_accounts/main/index', 'token' => $_GET['token']]));
} else {
    $controller = Yii::$app->controller;
    echo $controller->render('createAccount_original', array(
            'hForm' => $hForm,
            'needAproval' => false)
    );
}
?>