<?php
/* @var $this BallsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Balls',
);

$this->menu=array(
	array('label'=>'Create Balls', 'url'=>array('create')),
	array('label'=>'Manage Balls', 'url'=>array('admin')),
);
?>

<h1>Balls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
