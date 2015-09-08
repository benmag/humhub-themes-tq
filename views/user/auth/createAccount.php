<?php
if(isset(Yii::app()->modules['anon_accounts'])) {

	Yii::app()->request->redirect(Yii::app()->createUrl('//anon_accounts/main/index', array('token' => $_GET['token'])));

} else {

	$controller = Yii::app()->controller;
	$controller->renderPartial('application.modules.user.views.auth.createAccount_original', array(
        'form' => $form,
        'needAproval' => false)
    );
}
?>