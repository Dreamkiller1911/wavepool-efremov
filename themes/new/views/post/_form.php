<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'htmlOptions' => array(
            'role' => 'form',
        ),
    )); ?>


    <p class="note">Поля с <span class="required">*</span> обязательные.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textArea($model, 'title', array('size' => 80, 'maxlength' => 128, 'rows' => '2', 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'prev_content') ?>
        <?php $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
            'model' => $model,
            'attribute' => 'prev_content',
            'language' => 'ru',
            'height' => '500px',
            'editorTemplate' => 'full',
        )); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'content') ?>
        <?php $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
            'model' => $model,
            'attribute' => 'content',
            'language' => 'ru',
            'editorTemplate' => 'full',
        )); ?>
    </div>

    <div class="row form-group">
        <div class="col-sm-6">
            <?php echo $form->labelEx($model, 'menu_name') ?>
            <?php echo $form->textField($model, 'menu_name', array('class' => 'form-control')) ?>
            <?php echo $form->error($model, 'menu_name'); ?>
        </div>
    </div>
    <div class="row form-group">
        <p>Добавить фотографии</p>

        <div class="row">
            <div class="col-xs-6">
                <?php echo CHtml::label('Загрузите новые', 'newImg') ?>
                <?php echo CHtml::fileField('newImg') ?>
            </div>
            <div class="col-xs-6">
                <div class="row-fluid">
                    <?php echo CHtml::label('Выберите из альбома', 'fromAlbumImg') ?>
                    <?php echo CHtml::dropDownList('fromAlbumImg', '', Albums::getListAlbum(), array(
                        'id' => 'getImgAlbum',
                    )) ?>
                </div>
                <div class="row-fluid" id="placeImgAlbums">

                </div>
            </div>
        </div>
    </div>


    <div class="row form-group">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', Lookup::items('PostStatus'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>


    </div>


    <div class="row form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-default btn-block')); ?>
        </div>
        <div class="col-sm-4">
            <input class="btn btn-default btn-block disabled" value="Предосмотр">
        </div>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->