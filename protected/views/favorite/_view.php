<?php
/* @var $this FavoriteController */
/* @var $data Favorite */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issue), array('view', 'id'=>$data->issue)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('redball')); ?>:</b>
	<?php echo CHtml::encode($data->redball); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blueball')); ?>:</b>
	<?php echo CHtml::encode($data->blueball); ?>
	<br />


</div>