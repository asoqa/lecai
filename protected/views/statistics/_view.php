<?php
/* @var $this StatisticsController */
/* @var $data Statistics */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issue), array('view', 'id'=>$data->issue)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum_r')); ?>:</b>
	<?php echo CHtml::encode($data->sum_r); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_r')); ?>:</b>
	<?php echo CHtml::encode($data->min_r); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_r')); ?>:</b>
	<?php echo CHtml::encode($data->max_r); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mean_r')); ?>:</b>
	<?php echo CHtml::encode($data->mean_r); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum_all')); ?>:</b>
	<?php echo CHtml::encode($data->sum_all); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_all')); ?>:</b>
	<?php echo CHtml::encode($data->max_all); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('min_all')); ?>:</b>
	<?php echo CHtml::encode($data->min_all); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mean_all')); ?>:</b>
	<?php echo CHtml::encode($data->mean_all); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('redball')); ?>:</b>
	<?php echo CHtml::encode($data->redball); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blueball')); ?>:</b>
	<?php echo CHtml::encode($data->blueball); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	*/ ?>

</div>