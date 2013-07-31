<?php
/* @var $this FavoriteController */
/* @var $model Favorite */

$this->breadcrumbs=array(
	'Favorites'=>array('index'),
	$model->issue=>array('view','id'=>$model->issue),
	'Update',
);

$this->menu=array(
	array('label'=>'List Favorite', 'url'=>array('index')),
	array('label'=>'Create Favorite', 'url'=>array('create')),
	array('label'=>'View Favorite', 'url'=>array('view', 'id'=>$model->issue)),
	array('label'=>'Manage Favorite', 'url'=>array('admin')),
);
?>

<h1>Update Favorite <?php echo $model->issue; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>