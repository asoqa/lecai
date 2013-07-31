<?php
/* @var $this TheoryResourceController */
/* @var $model TheoryResource */

$this->breadcrumbs=array(
	'Theory Resources'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TheoryResource', 'url'=>array('index')),
	array('label'=>'Manage TheoryResource', 'url'=>array('admin')),
);
?>

<h1>Create TheoryResource</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>