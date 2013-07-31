<?php
/* @var $this BallsController */
/* @var $model Balls */

$this->breadcrumbs=array(
	'Balls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Balls', 'url'=>array('index')),
	array('label'=>'Manage Balls', 'url'=>array('admin')),
);
?>

<h1>Create Balls</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>