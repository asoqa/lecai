<?php
/* @var $this FavoriteController */
/* @var $model Favorite */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'favorite-form',
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
		<?php echo $form->labelEx($model,'redball'); ?>
		<?php echo $form->textField($model,'redball',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'redball'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blueball'); ?>
		<?php echo $form->textField($model,'blueball',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'blueball'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->