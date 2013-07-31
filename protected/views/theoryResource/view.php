<?php
/* @var $this TheoryResourceController */
/* @var $model TheoryResource */

$this->breadcrumbs=array(
	'Theory Resources'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TheoryResource', 'url'=>array('index')),
	array('label'=>'Create TheoryResource', 'url'=>array('create')),
	array('label'=>'Update TheoryResource', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TheoryResource', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TheoryResource', 'url'=>array('admin')),
);
?>

<h1>View TheoryResource #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'key',
		'value',
		'type',
	),
)); ?>
