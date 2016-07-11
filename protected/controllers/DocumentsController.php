<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 29.04.2016
 * Time: 12:27
 */
class DocumentsController extends Controller
{
    public function init()
    {
        $cs = parent::init();
        return $cs;
    }
    public function actionAdmin()
    {

        $this->render('admin');
    }
    public function actionAdd()
    {

    }

}