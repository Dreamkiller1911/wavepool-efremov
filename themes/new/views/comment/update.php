<?php
$this->breadcrumbs=array(
	'Коментарии'=>array('index'),
	'Изменить коментарий №'.$model->id,
);
?>

<h1>Изменение коментария №<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>