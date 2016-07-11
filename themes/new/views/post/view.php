<?php
$this->breadcrumbs=array(
	$this->pageTitle = $model->title,
);
$this->widget('application.extensions.fancybox.EFancyBox', array(
				'target'=>'a[href*="http://volna.ru/images/gallery"]',
				'config'=>array(),
		)
);
$this->init()->registerMetaTag($model->title, 'description');
$this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' коментариев' : 'Один коментарий'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Напишите свой отзыв</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array(
			'model'=>$comment,
		)); ?>
	<?php endif; ?>

</div>
