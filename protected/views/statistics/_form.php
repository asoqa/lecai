<?php
/* @var $this StatisticsController */
/* @var $model Statistics */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'statistics-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'issue'); ?>
		<?php echo $form->textField($model,'issue',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'issue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sum_r'); ?>
		<?php echo $form->textField($model,'sum_r'); ?>
		<?php echo $form->error($model,'sum_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_r'); ?>
		<?php echo $form->textField($model,'min_r'); ?>
		<?php echo $form->error($model,'min_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_r'); ?>
		<?php echo $form->textField($model,'max_r'); ?>
		<?php echo $form->error($model,'max_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mean_r'); ?>
		<?php echo $form->textField($model,'mean_r'); ?>
		<?php echo $form->error($model,'mean_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sum_all'); ?>
		<?php echo $form->textField($model,'sum_all'); ?>
		<?php echo $form->error($model,'sum_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_all'); ?>
		<?php echo $form->textField($model,'max_all'); ?>
		<?php echo $form->error($model,'max_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_all'); ?>
		<?php echo $form->textField($model,'min_all'); ?>
		<?php echo $form->error($model,'min_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mean_all'); ?>
		<?php echo $form->textField($model,'mean_all'); ?>
		<?php echo $form->error($model,'mean_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'redball'); ?>
		<?php echo $form->textField($model,'redball',array('size'=>33,'maxlength'=>33)); ?>
		<?php echo $form->error($model,'redball'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blueball'); ?>
		<?php echo $form->textField($model,'blueball'); ?>
		<?php echo $form->error($model,'blueball'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->