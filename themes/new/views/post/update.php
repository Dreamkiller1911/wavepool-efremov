<?php
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs=array(
	'Обновление новости',
);
?>

<h3>Изменение <i><?php echo CHtml::encode($model->title); ?></i></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>