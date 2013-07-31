<?php
/* @var $this HistoryController */
/* @var $data History */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issue), array('view', 'id'=>$data->issue)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sale')); ?>:</b>
	<?php echo CHtml::encode($data->sale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pricebool')); ?>:</b>
	<?php echo CHtml::encode($data->pricebool); ?>
	<br />


</div>