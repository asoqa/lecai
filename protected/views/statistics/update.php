<?php
/* @var $this StatisticsController */
/* @var $model Statistics */

$this->breadcrumbs=array(
	'Statistics'=>array('index'),
	$model->issue=>array('view','id'=>$model->issue),
	'Update',
);

$this->menu=array(
	array('label'=>'List Statistics', 'url'=>array('index')),
	array('label'=>'Create Statistics', 'url'=>array('create')),
	array('label'=>'View Statistics', 'url'=>array('view', 'id'=>$model->issue)),
	array('label'=>'Manage Statistics', 'url'=>array('admin')),
);
?>

<h1>Update Statistics <?php echo $model->issue; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>