<?php
/* @var $this HistoryCombinationController */
/* @var $model HistoryCombination */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-combination-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'issue'); ?>
		<?php echo $form->textField($model,'issue'); ?>
		<?php echo $form->error($model,'issue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'combination'); ?>
		<?php echo $form->textField($model,'combination',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'combination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_continous'); ?>
		<?php echo $form->textField($model,'is_continous'); ?>
		<?php echo $form->error($model,'is_continous'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'length'); ?>
		<?php echo $form->textField($model,'length'); ?>
		<?php echo $form->error($model,'length'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->