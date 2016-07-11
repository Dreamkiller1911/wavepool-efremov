<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 19.04.2016
 * Time: 14:51
 */
class Services extends myWidget
{
    public function init()
    {
        $cs = $this->getOwner()->init();
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/services.js');
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/servicesController.js', CClientScript::POS_END);
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/services.css');

        $this->render('services');
    }
}