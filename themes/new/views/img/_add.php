<div class="form" id="loadImg">


<?php $form = $this->beginWidget('CActiveForm', array(
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
))?>
<!--<form action="/img/add" method="post" enctype="multipart/form-data">-->

        <div id="addImgBtn">
           <?php echo CHtml::fileField('GalleryImg[]', '', array('multiple'=>true))?>
        </div>


        <div id="newImg"></div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model, 'album')?>
        <?php echo CHtml::activeDropDownList($model, 'album', Albums::getListAlbum() )?>
        <a href="/media/newAlbum"><button type="button" class="btn btn-default btn-sm">Создать новый</button></a>

    </div>
        <div class="row">
            <?php echo CHtml::submitButton('Загрузить')?>
        </div>
        <div class="row">
            <?php echo $form->errorSummary($model)?>
        </div>


<!--</form>-->
<?php $this->endWidget()?>
</div>