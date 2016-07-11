<?php
/* @var $this GalleryImgController */
/* @var $model GalleryImg */

$this->breadcrumbs=array(
	'Gallery Img'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GalleryImg', 'url'=>array('index')),
	array('label'=>'Create GalleryImg', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gallery-img-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление изображениями в галереи</h3>



<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">

</div><!-- search-form -->
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		'filter'=>$model,
		'columns'=>array(
				array(
						'name'=>'id',
						'type'=>'raw',
						'value'=>'$data->id'

				),
				array(
						'name'=>'simple_url',
						'type'=>'image',
						'htmlOptions'=>array(
								'class'=>'text-center'
						)

				),
				array(
						'name'=>'description',
						'type'=>'raw',

				),
				array(
						'name'=>'album',
						'type'=>'raw',
						'value'=>'$data->Album()->description',
						'htmlOptions'=>array(
							'class'=>'text-center'
						)

				),
				array(
						'class'=>'CButtonColumn',
				),
		),
)); ?>



