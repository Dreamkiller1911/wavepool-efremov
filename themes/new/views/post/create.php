<?php
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs=array(
	'Создание новости',
);
$this->widget('application.extensions.fancybox.EFancyBox', array(
				'target'=>'a[href*="http://volna.ru/images/gallery"]',
				'config'=>array(),
		)
);
?>
<h1>Создать новость</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<script>

</script>
