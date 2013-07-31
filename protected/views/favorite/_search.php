<?php
/* @var $this FavoriteController */
/* @var $model Favorite */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'issue'); ?>
		<?php echo $form->textField($model,'issue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'redball'); ?>
		<?php echo $form->textField($model,'redball',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'blueball'); ?>
		<?php echo $form->textField($model,'blueball',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->