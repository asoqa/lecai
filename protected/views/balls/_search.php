<?php
/* @var $this BallsController */
/* @var $model Balls */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ball'); ?>
		<?php echo $form->textField($model,'ball'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mean_rounds'); ?>
		<?php echo $form->textField($model,'mean_rounds'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_rounds'); ?>
		<?php echo $form->textField($model,'max_rounds'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_rounds'); ?>
		<?php echo $form->textField($model,'current_rounds'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mean_days'); ?>
		<?php echo $form->textField($model,'mean_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_days'); ?>
		<?php echo $form->textField($model,'max_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_days'); ?>
		<?php echo $form->textField($model,'current_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->