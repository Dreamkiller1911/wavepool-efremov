<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'defaultColumn';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function init()
    {

        $ref = $_SERVER['HTTP_REFERER'];
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        if(!isset($ref)){
            $cs->registerScript('body',
                'var myBody = new body("#contentBlock");' .
//				'$(body).scroll(function(){myBody.resizeBackground()});'
                'myBody.resizeBackground();' .
                '$(\'.imgLogo\').addClass(\'load\');'

                , CClientScript::POS_LOAD);

        }
        return $cs;
    }
}