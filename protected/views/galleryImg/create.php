<?php
/* @var $this GalleryImgController */
/* @var $model GalleryImg */

$this->breadcrumbs=array(
	'Gallery Imgs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GalleryImg', 'url'=>array('index')),
	array('label'=>'Manage GalleryImg', 'url'=>array('admin')),
);
?>

<h1>Create GalleryImg</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>