<?php
/* @var $this GuestsController */
/* @var $model Guests */
/* @var $form CActiveForm */
?>
<div class="row">

    <div class="col-xs-12">

        <div class="form form-group">

            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'guests-form',
                'enableAjaxValidation' => false,
            )); ?>

            <div class="row note head text-center">
                <div class="col-xs-12">
                    <h4>Оставленные вами коментарии станут видны пользователям в течение дня, после проверки
                        Администратором сайта</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="note">Поля с <span class="required">*</span> обязательные.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'name'); ?>
                        <?php echo $form->textField($model, 'name', array('size' => 30, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </div>

                    <div class="row">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 150, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model, 'text'); ?>
                    <?php echo $form->textArea($model, 'text', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'text'); ?>
                </div>
            </div>
            <?php if (CCaptcha::checkRequirements()): ?>
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo $form->labelEx($model, 'verifyCode'); ?>
                    </div>
                    <div class="col-xs-3">
                        <?php $this->widget('CCaptcha', array(
                            'showRefreshButton' => false,
                            'clickableImage' => true,
                        )); ?>
                    </div>
                    <div class="col-xs-5">
                        <div class="row">
                            <div class="col-xs-7">
                                <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <?php echo $form->error($model, 'verifyCode'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="hint well">Пожалуйста, введите буквы, изображенные на картинке выше.
                            <br/>Буквы не чувствительны к регистру.
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="row">
                <div class="col-xs-12">
                    <?php echo CHtml::submitButton('Отправить', array('class' => 'btn btn-default')); ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>