<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->issue=>array('view','id'=>$model->issue),
	'Update',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Create History', 'url'=>array('create')),
	array('label'=>'View History', 'url'=>array('view', 'id'=>$model->issue)),
	array('label'=>'Manage History', 'url'=>array('admin')),
);
?>

<h1>Update History <?php echo $model->issue; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>