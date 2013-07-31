<?php
/* @var $this BallsController */
/* @var $model Balls */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'balls-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ball'); ?>
		<?php echo $form->textField($model,'ball'); ?>
		<?php echo $form->error($model,'ball'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mean_rounds'); ?>
		<?php echo $form->textField($model,'mean_rounds'); ?>
		<?php echo $form->error($model,'mean_rounds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_rounds'); ?>
		<?php echo $form->textField($model,'max_rounds'); ?>
		<?php echo $form->error($model,'max_rounds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_rounds'); ?>
		<?php echo $form->textField($model,'current_rounds'); ?>
		<?php echo $form->error($model,'current_rounds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mean_days'); ?>
		<?php echo $form->textField($model,'mean_days'); ?>
		<?php echo $form->error($model,'mean_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_days'); ?>
		<?php echo $form->textField($model,'max_days'); ?>
		<?php echo $form->error($model,'max_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_days'); ?>
		<?php echo $form->textField($model,'current_days'); ?>
		<?php echo $form->error($model,'current_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
		<?php echo $form->error($model,'count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->