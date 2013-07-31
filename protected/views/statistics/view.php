<?php
/* @var $this StatisticsController */
/* @var $model Statistics */

$this->breadcrumbs=array(
	'Statistics'=>array('index'),
	$model->issue,
);

$this->menu=array(
	array('label'=>'List Statistics', 'url'=>array('index')),
	array('label'=>'Create Statistics', 'url'=>array('create')),
	array('label'=>'Update Statistics', 'url'=>array('update', 'id'=>$model->issue)),
	array('label'=>'Delete Statistics', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->issue),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Statistics', 'url'=>array('admin')),
);
?>

<h1>View Statistics #<?php echo $model->issue; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'issue',
		'sum_r',
		'min_r',
		'max_r',
		'mean_r',
		'sum_all',
		'max_all',
		'min_all',
		'mean_all',
		'redball',
		'blueball',
		'date',
	),
)); ?>
