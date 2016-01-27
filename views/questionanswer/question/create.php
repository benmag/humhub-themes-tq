<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<?php $form = \yii\widgets\ActiveForm::begin(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<strong>Ask</strong> a new question
	            </div>
	            <div class="panel-body">
	            	<?php echo $form->errorSummary($model); ?>
            		<?php //echo $form->error($model,'post_title'); ?>
            		<?php echo $form->field($model,'post_title')->textArea(array('id'=>'contentForm_question', 'class' => 'form-control autosize contentForm', 'rows' => '1', "placeholder" => "Ask something...")); ?>
                    <?php echo $form->field($model, 'containerClass')->hiddenInput(array('value' => 'Space'))->label(false); ?>
                    <?php echo $form->field($model, 'containerGuid')->hiddenInput(array('value' => '204a13c6-db8e-4cd9-9e81-66055e1b1a50'))->label(false); ?>

                    <div class="contentForm_options">
                    	<?php //echo $form->error($model,'post_text'); ?>
                    	<?php echo $form->field($model,'post_text')->textArea(array('id' => "contentForm_answersText", 'rows' => '5', 'style' => 'height: auto !important;', "class" => "form-control contentForm", "placeholder" => "Question details...")); ?>
                    <br />
                        <?php echo yii\helpers\Html::textarea('Tags', null, array('class' => 'form-control autosize contentForm', "placeholder" => "Tags... Specify at least one tag for your question")); ?>
                    </div>
                    <div class="pull-left" style="margin-top:5px;">
                    <?php
                    // Creates Uploading Button
                    echo \humhub\modules\file\widgets\FileUploadButton::widget(array(
                        'uploaderId' => 'contentFormFiles',
                        'fileListFieldName' => 'fileList',
                    ));
                    ?>
                    <script>
                        $('#fileUploaderButton_contentFormFiles').bind('fileuploaddone', function (e, data) {
                            $('.btn_container').show();
                        });

                        $('#fileUploaderButton_contentFormFiles').bind('fileuploadprogressall', function (e, data) {
                            var progress = parseInt(data.loaded / data.total * 100, 10);
                            if (progress != 100) {
                                // Fix: remove focus from upload button to hide tooltip
                                $('#post_submit_button').focus();

                                // hide form buttons
                                $('.btn_container').hide();
                            }
                        });
                    </script>
                    <?php
                    // Creates a list of already uploaded Files
                    //TODO: UPDATE
//                    $this->widget('application.modules_core.file.widgets.FileUploadListWidget', array(
//                        'uploaderId' => 'contentFormFiles'
//                    ));
                    ?>
                    </div>

                    <?php
                    \yii\helpers\Html::hiddenInput("containerGuid", Yii::$app->user->guid);
                    \yii\helpers\Html::hiddenInput("containerClass",  get_class(new \humhub\modules\user\models\User()));
                    ?>
					<?php echo yii\helpers\Html::submitButton('Submit', array('class' => ' btn btn-info pull-right', 'style' => 'margin-top: 5px;')); ?>
                </div>
            </div>
        </div>
   </div>
</div>

<?php \yii\widgets\ActiveForm::end(); ?>
