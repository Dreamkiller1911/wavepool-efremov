<?php
/* @var $this GalleryImgController */
/* @var $model GalleryImg */

$this->breadcrumbs=array(
	'Gallery Imgs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GalleryImg', 'url'=>array('index')),
	array('label'=>'Create GalleryImg', 'url'=>array('create')),
	array('label'=>'Update GalleryImg', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GalleryImg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GalleryImg', 'url'=>array('admin')),
);
?>

<h1>View GalleryImg #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'simple_url',
		'description',
		'album',
	),
)); ?>
