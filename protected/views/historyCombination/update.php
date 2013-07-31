<?php
/* @var $this HistoryCombinationController */
/* @var $model HistoryCombination */

$this->breadcrumbs=array(
	'History Combinations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HistoryCombination', 'url'=>array('index')),
	array('label'=>'Create HistoryCombination', 'url'=>array('create')),
	array('label'=>'View HistoryCombination', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HistoryCombination', 'url'=>array('admin')),
);
?>

<h1>Update HistoryCombination <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>