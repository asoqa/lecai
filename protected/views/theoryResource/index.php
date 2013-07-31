<?php
/* @var $this TheoryResourceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Theory Resources',
);

$this->menu=array(
	array('label'=>'Create TheoryResource', 'url'=>array('create')),
	array('label'=>'Manage TheoryResource', 'url'=>array('admin')),
);
?>

<h1>Theory Resources</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
