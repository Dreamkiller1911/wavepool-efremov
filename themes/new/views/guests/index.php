<?php
/* @var $this GuestsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Гостевая',
);
$this->pageTitle = Yii::app()->name . ' - Гостевая';
$this->init()->registerMetaTag('гостева, комментарии, отзыва, предложения, книга жалоб, обсуждение', 'keywords');
$this->init()->registerMetaTag('Мы всегда рады вашим сообщениям. Пэтому на нашем сайте для вас имеется раздел,' .
		' где вы можете оставить свое мнение, отзыв или предложение', 'description');

?>

<h4>На этой странице вы можете оставить свои пожелания и отзывы</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'ajaxUpdate'=>true,
	'id'=>'viewApproved',
)); ?>

<div id="form">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
