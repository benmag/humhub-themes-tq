<?php

use humhub\models\Setting;

?>
<div class="panel panel-default">
    <div
        class="panel-heading"><?php echo Yii::t('AdminModule.views_setting_index', '<strong>Basic</strong> settings'); ?></div>
    <div class="panel-body">

        <?php
        $form = \yii\bootstrap\ActiveForm::begin(array(
            'id' => 'basic-settings-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->field($model, 'name')->textInput(array('class' => 'form-control', 'readonly' => Setting::IsFixed('name'))); ?>
        </div>

        <div class="form-group">
            <?php echo $form->field($model, 'baseUrl')->textInput(array('class' => 'form-control', 'readonly' => Setting::IsFixed('baseUrl'))); ?>
            <p class="help-block"><?php echo Yii::t('AdminModule.views_setting_index', 'E.g. http://example.com/humhub'); ?></p>
        </div>

        <div class="form-group">
            <?php echo $form->field($model, 'defaultLanguage')->dropDownList(Yii::$app->params['availableLanguages'], array('class' => 'form-control', 'readonly' => Setting::IsFixed('defaultLanguage'))); ?>
        </div>


        <?php echo $form->field($model, 'defaultSpaceGuid')->textInput(array('class' => 'form-control', 'id' => 'space_select')); ?>
        <?php
        echo \humhub\modules\space\widgets\Picker::widget([
            'inputId' => 'space_select',
            'model' => $model,
            'maxSpaces' => 50,
            'attribute' => 'defaultSpaceGuid'
        ]);
        ?>
        <p class="help-block"><?php echo Yii::t('AdminModule.views_setting_index', 'New users will automatically added to these space(s).'); ?></p>


        <strong><?php echo Yii::t('AdminModule.views_setting_index', 'Dashboard'); ?></strong>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?php echo $form->field($model, 'tour')->checkbox(); ?> <?php echo $model->getAttributeLabel('tour'); ?>
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <?php echo $form->field($model, 'dashboardShowProfilePostForm')->checkbox(); ?> <?php echo $model->getAttributeLabel('dashboardShowProfilePostForm'); ?>
                </label>
            </div>
        </div>

        <hr>

        <?php echo \yii\helpers\Html::submitButton(Yii::t('AdminModule.views_setting_index', 'Save'), array('class' => 'btn btn-primary')); ?>

        <!-- show flash message after saving -->
        <?php echo \humhub\widgets\DataSaved::widget();?>

        <?php \yii\bootstrap\ActiveForm::end(); ?>

    </div>
</div>

