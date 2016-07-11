<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 19.04.2016
 * Time: 15:51
 */
class ServicesController extends Controller
{
    public function actionGetDataFile()
    {
        $path = Yii::getPathOfAlias('webroot') . '/assets/data/';
        $file = trim($_POST['file']) . '.json';
        $fileName = $path . $file;

        $json = json_decode(file_get_contents($fileName));

        echo json_encode($json);
    }
}