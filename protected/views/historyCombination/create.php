<?php
/* @var $this HistoryCombinationController */
/* @var $model HistoryCombination */

$this->breadcrumbs=array(
	'History Combinations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HistoryCombination', 'url'=>array('index')),
	array('label'=>'Manage HistoryCombination', 'url'=>array('admin')),
);
?>

<h1>Create HistoryCombination</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>