<?php
/* @var $this HistoryCombinationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'History Combinations',
);

$this->menu=array(
	array('label'=>'Create HistoryCombination', 'url'=>array('create')),
	array('label'=>'Manage HistoryCombination', 'url'=>array('admin')),
);
?>

<h1>History Combinations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
