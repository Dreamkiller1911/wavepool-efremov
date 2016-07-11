<?php
$this->pageTitle = '123';

$this->breadcrumbs = array(
    'Добавить фотографии'=>'/img/add/',
    'Новый альбом'
)?>


<div class="form">
    <?php $form = $this->beginWidget('CActiveForm')?>
    <div class="row">
        <h4>Введите название нового альбома</h4>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabelEx($model, 'description')?>
        <?php echo CHtml::activeTextField($model, 'description')?>
        <?php echo $form->error($model, 'description')?>
    </div>
    <div class="row">
        <?php echo CHtml::submitButton('Создать')?>
    </div>

    <?php $this->endWidget()?>
</div>