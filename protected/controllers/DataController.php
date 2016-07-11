<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 04.05.2016
 * Time: 15:59
 */
class DataController extends Controller
{
    public function actionReturnData($path)
    {
        $path = CHtml::decode($path);
        header('Content-type: application/pdf');

        readfile($path);
    }
}