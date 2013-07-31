<?php
/* @var $this FavoriteController */
/* @var $model Favorite */

$this->breadcrumbs=array(
	'Favorites'=>array('index'),
	$model->issue,
);

$this->menu=array(
	array('label'=>'List Favorite', 'url'=>array('index')),
	array('label'=>'Create Favorite', 'url'=>array('create')),
	array('label'=>'Update Favorite', 'url'=>array('update', 'id'=>$model->issue)),
	array('label'=>'Delete Favorite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->issue),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Favorite', 'url'=>array('admin')),
);
?>

<h1>View Favorite #<?php echo $model->issue; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'issue',
		'redball',
		'blueball',
	),
)); ?>
