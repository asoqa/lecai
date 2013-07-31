<?php
/* @var $this HistoryCombinationController */
/* @var $data HistoryCombination */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?php echo CHtml::encode($data->issue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combination')); ?>:</b>
	<?php echo CHtml::encode($data->combination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_continous')); ?>:</b>
	<?php echo CHtml::encode($data->is_continous); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('length')); ?>:</b>
	<?php echo CHtml::encode($data->length); ?>
	<br />


</div>