<?php
/* @var $this BallsController */
/* @var $data Balls */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ball')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ball), array('view', 'id'=>$data->ball)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mean_rounds')); ?>:</b>
	<?php echo CHtml::encode($data->mean_rounds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_rounds')); ?>:</b>
	<?php echo CHtml::encode($data->max_rounds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_rounds')); ?>:</b>
	<?php echo CHtml::encode($data->current_rounds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mean_days')); ?>:</b>
	<?php echo CHtml::encode($data->mean_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_days')); ?>:</b>
	<?php echo CHtml::encode($data->max_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_days')); ?>:</b>
	<?php echo CHtml::encode($data->current_days); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	*/ ?>

</div>