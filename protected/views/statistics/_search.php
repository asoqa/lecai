<?php
/* @var $this StatisticsController */
/* @var $model Statistics */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'issue'); ?>
		<?php echo $form->textField($model,'issue',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sum_r'); ?>
		<?php echo $form->textField($model,'sum_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_r'); ?>
		<?php echo $form->textField($model,'min_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_r'); ?>
		<?php echo $form->textField($model,'max_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mean_r'); ?>
		<?php echo $form->textField($model,'mean_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sum_all'); ?>
		<?php echo $form->textField($model,'sum_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_all'); ?>
		<?php echo $form->textField($model,'max_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_all'); ?>
		<?php echo $form->textField($model,'min_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mean_all'); ?>
		<?php echo $form->textField($model,'mean_all'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'redball'); ?>
		<?php echo $form->textField($model,'redball',array('size'=>33,'maxlength'=>33)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'blueball'); ?>
		<?php echo $form->textField($model,'blueball'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->