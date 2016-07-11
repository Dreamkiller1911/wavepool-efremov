<?php
/* @var $this GalleryImgController */
/* @var $model GalleryImg */

$this->breadcrumbs=array(
	'Галерея'=>array('index'),
	'Добавить',
);

$this->widget('application.extensions.fancybox.EFancyBox', array(
				'target'=>'a[rel=gallery]',
				'config'=>array(),
		)
);

?>

<h3>Добавление фотографий</h3>

<?php $this->renderPartial('_add', array('model'=>$model)); ?>