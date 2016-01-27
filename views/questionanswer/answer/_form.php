<?php
/* @var $this AnswerController */
/* @var $model Answer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = \yii\widgets\ActiveForm::begin([
//	'action' => \yii\helpers\Url::to(['question/update'])
]); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->field($model,'question_id'); ?>
	<?php echo $form->field($model,'parent_id'); ?>
	<?php echo $form->field($model,'post_title'); ?>
	<?php echo $form->field($model,'post_text'); ?>
	<?php echo $form->field($model,'post_type'); ?>
	<?php echo $form->field($model,'created_at'); ?>
	<?php echo $form->field($model,'created_by'); ?>
	<?php echo $form->field($model,'updated_at'); ?>
	<?php echo $form->field($model,'updated_by'); ?>

	<div class="row buttons">
    	<div class="col-xs-12">
			<?php echo \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Save');
			//TODO: Update the button above.?>
		</div>
	</div>

	<?php \yii\widgets\ActiveForm::end(); ?>

</div><!-- form -->