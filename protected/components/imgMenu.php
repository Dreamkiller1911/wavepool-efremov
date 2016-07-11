<?php

Yii::import('zii.widgets.CPortlet');

class imgMenu extends CPortlet
{
    public function init()
    {
        $this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }

    public function renderContent()
    {
        $this->render('imgMenu');
    }

}