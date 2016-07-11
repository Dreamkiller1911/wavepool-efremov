<?php
/* @var $this GuestsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Guests',
);

$this->menu=array(
	array('label'=>'Create Guests', 'url'=>array('create')),
	array('label'=>'Manage Guests', 'url'=>array('admin')),
);
?>

<h1>Guests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
