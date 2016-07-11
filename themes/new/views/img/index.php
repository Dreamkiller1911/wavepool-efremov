<?php
/* @var $this GalleryImgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gallery Imgs',
);

$this->menu=array(
	array('label'=>'Create GalleryImg', 'url'=>array('create')),
	array('label'=>'Manage GalleryImg', 'url'=>array('admin')),
);
?>

<h1>Gallery Imgs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
