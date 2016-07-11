<?php
/* @var $this GuestsController */
/* @var $data Guests */
?>

<div class="row-fluid viewGuests well">

	<div class="row">
		<div class="col-xs-6">
			<span class="glyphicon glyphicon-user"></span>
			<span class="text-info"><?php echo CHtml::encode($data->name); ?></span>
			<span class="small text-muted">(<?php echo Yii::app()->dateFormatter->format('d MMMM, yyyy HH:mm', strtotime($data->date_create)) ?>)</span>
		</div>
	</div>
	<br>
	<div class="row">
		<div style="white-space: pre" class="col-xs-12 text"><span><?php echo CHtml::encode($data->text); ?></span></div>
	</div>


</div>