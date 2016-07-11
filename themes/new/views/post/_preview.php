
<br>
<div class="row post">
	<div class="title">
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</div>
	<div class="author">
		Добавленно <?php echo $data->author->username . ' ' . Yii::app()->dateFormatter->format('(d MMMM, yyyy)', $data->create_time); ?>
	</div>
	<div class="content row">
		<?php
		echo CHtml::decode($data->prev_content);

		?>
	</div>
	<div class="nav row">
		<?php echo CHtml::link("Коментарии ({$data->commentCount})",$data->url.'#comments'); ?> |
		Последний обновление ( <?php echo Yii::app()->dateFormatter->format('d MMMM, yyyy HH:mm ', $data->update_time); ?>)
		<?php if(!Yii::app()->user->isGuest):?>
				<a href="<?php echo $this->createUrl('post/update', array('id'=>$data->id))?>"><span class="glyphicon glyphicon-edit"></span></a>
		<?php endif?>
	</div>
</div>
