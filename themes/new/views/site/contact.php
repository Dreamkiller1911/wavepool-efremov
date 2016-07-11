<?php
$this->pageTitle=Yii::app()->name . ' - Обратная связь';
$this->breadcrumbs=array(
	'Обратная связь',
);
$this->init()->registerMetaTag('Писмо администрации, обратная связь, предложения, жалобы, спросить', 'keywords');
$this->init()->registerMetaTag('Форма обратной связи с адмиинстрацией сайта ' . Yii::app()->name .
		'.Если у вас есть вопросы или предложения, жалобы или что то иное - пишите нам. Мы всегда рады вашим сообщения, ' .
		'и постараемя незамедлительно дать вам ответ. Спасибо');
?>

<h1>Письмо администрации</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p class="well">
	Если у вас есть деловое предложение или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами. Спасибо.
</p>
<div class="col-xs-8 col-xs-offset-2">
<div class="form form-group-sm ">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Поля с <span class="required">*</span> обязательные.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'email');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'subject');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>8, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'body');?>
	</div>

	<?php if (CCaptcha::checkRequirements()): ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
				<?php echo $form->labelEx($model, 'verifyCode'); ?>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<?php $this->widget('CCaptcha', array(
								'clickableImage' => true,
								'showRefreshButton' => false,
								'buttonOptions' => array('class' => 'text-info')
						)); ?>
					</div>
					<div class="col-xs-7">
						<?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control')); ?>
						<?php echo $form->error($model, 'verifyCode'); ?>
					</div>
				</div>


				<div class="row">
					<div class="hint well well-lg">Пожалуйста, введите буквы, изображенные на картинке выше.
						<br/>Буквы не чувствительны к регистру.
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row submit">
		<?php echo CHtml::submitButton('Отправить', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php endif; ?>