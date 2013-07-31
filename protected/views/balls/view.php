<?php
/* @var $this BallsController */
/* @var $model Balls */

$this->breadcrumbs=array(
	'Balls'=>array('index'),
	$model->ball,
);

$this->menu=array(
	array('label'=>'List Balls', 'url'=>array('index')),
	array('label'=>'Create Balls', 'url'=>array('create')),
	array('label'=>'Update Balls', 'url'=>array('update', 'id'=>$model->ball)),
	array('label'=>'Delete Balls', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ball),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Balls', 'url'=>array('admin')),
);
?>

<h1>View Balls #<?php echo $model->ball; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ball',
		'mean_rounds',
		'max_rounds',
		'current_rounds',
		'mean_days',
		'max_days',
		'current_days',
		'count',
	),
)); ?>
