<?php
/* @var $this GalleryImgController */
/* @var $model GalleryImg */

$this->breadcrumbs=array(
	'Gallery Imgs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GalleryImg', 'url'=>array('index')),
	array('label'=>'Create GalleryImg', 'url'=>array('create')),
	array('label'=>'View GalleryImg', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GalleryImg', 'url'=>array('admin')),
);
?>

<h1>Update GalleryImg <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>