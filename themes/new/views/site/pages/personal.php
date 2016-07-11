<?php
$this->pageTitle = Yii::app()->name . ' - Сотрудники';
$this->breadcrumbs = array(
    'Сотрудники',
);
$this->init()->registerCssFile(Yii::app()->theme->baseUrl . '/css/personal.css');
$this->init()->registerMetaTag('Сотрудники, персонал, тренеры, коллектив', 'keywords');


$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a[rel=gallery]',
        'config'=>array(),
    )
);

$this->layout = 'defaultColumn'
?>
<div class="row"><br><br></div>

<div id="personal">
    <div class="row-fluid">

        <div class="col-xs-6 img text-center">
            <a href="/images/site/personal/IMG_5697.JPG" rel="gallery" title="Тренер-преподаватель Каменева Г.М"><img
                    src="/images/site/personal/IMG_5697-prev.png" height="250px"></a>
            <h4>Тренер-преподаватель<br>
                Каменева Г.М</h4>
        </div>

        <div class="col-xs-6 text-center">
            <a href="/images/site/personal/IMG_5702.JPG" rel="gallery" title="Тренер-преподаватель Тарасова Е.В"><img
                    src="/images/site/personal/IMG_5702-prev.png" height="250px"></a>
            <h4>Тренер-преподаватель<br>Тарасова Е.В</h4>
        </div>

    </div>


    <div class="row-fluid">

        <div class="col-xs-6 img text-center">
            <a href="/images/site/personal/IMG_5776.JPG" rel="gallery" title="Тренер-преподаватель Плахов С.А"><img
                    src="/images/site/personal/IMG_5776-prev.png" height="250px"></a>
            <h4>Тренер-преподаватель<br> Плахов С.А</h4>
        </div>

        <div class="col-xs-6 text-center">

        </div>

    </div>


</div>


