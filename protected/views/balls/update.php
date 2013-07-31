<?php
/* @var $this BallsController */
/* @var $model Balls */

$this->breadcrumbs=array(
	'Balls'=>array('index'),
	$model->ball=>array('view','id'=>$model->ball),
	'Update',
);

$this->menu=array(
	array('label'=>'List Balls', 'url'=>array('index')),
	array('label'=>'Create Balls', 'url'=>array('create')),
	array('label'=>'View Balls', 'url'=>array('view', 'id'=>$model->ball)),
	array('label'=>'Manage Balls', 'url'=>array('admin')),
);
?>

<h1>Update Balls <?php echo $model->ball; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>