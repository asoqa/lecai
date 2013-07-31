<?php
/* @var $this TheoryResourceController */
/* @var $model TheoryResource */

$this->breadcrumbs=array(
	'Theory Resources'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TheoryResource', 'url'=>array('index')),
	array('label'=>'Create TheoryResource', 'url'=>array('create')),
	array('label'=>'View TheoryResource', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TheoryResource', 'url'=>array('admin')),
);
?>

<h1>Update TheoryResource <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>