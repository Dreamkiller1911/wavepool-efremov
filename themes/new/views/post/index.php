<?php

$this->pageTitle = 'Главная - ' . Yii::app()->name;
$this->breadcrumbs = array(
		'Новости'
);

$this->init()->registerMetaTag('главная, бассейн волна ефремов, волна ефремов, сауна ефремов, бассейн ефремов,бассейн волна ефремов сайт, бассейн в ефремове, бассейн волна в ефремове, мероприятия, отчеты, информация', 'keywords');
$this->init()->registerMetaTag('Детско-юношеская спортивная школа №6 «ВОЛНА».' .
		' Официальный сайт в г. Ефрмеов.Мы всегда рады  видеть Вас в нашем бассейне!', 'description');


$this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_preview',
'template'=>"{pager}\n{items}\n{pager}",
)); ?>