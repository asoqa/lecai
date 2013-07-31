<?php
/* @var $this HistoryCombinationController */
/* @var $model HistoryCombination */

$this->breadcrumbs=array(
	'History Combinations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HistoryCombination', 'url'=>array('index')),
	array('label'=>'Create HistoryCombination', 'url'=>array('create')),
	array('label'=>'Update HistoryCombination', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HistoryCombination', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HistoryCombination', 'url'=>array('admin')),
);
?>

<h1>View HistoryCombination #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'issue',
		'combination',
		'is_continous',
		'length',
	),
)); ?>
