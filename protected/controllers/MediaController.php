<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 04.04.2016
 * Time: 14:32
 */
class MediaController extends Controller
{

    public $layout = 'galleryColumn';

    public function init()
    {
        $cs = parent::init();
        $cs->registerCoreScript('jquery');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/gallery.css');
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/gallery.js');
        return $cs;
    }
    public function actionIndex(){
        $this->render('gallery');
    }
    public function actionVideo()
    {
        $this->init()->registerScriptFile(Yii::app()->theme->baseUrl . '/projekktor/projekktor-1.3.09.js');
        $this->init()->registerCssFile(Yii::app()->theme->baseUrl . '/projekktor/themes/maccaco/projekktor.style.css');
        $this->init()->registerScript('video',
            '$(document).ready(function() {
               projekktor(\'video\',
               {
               volume: 0.8,
               controls: true,
                playerFlashMP4: \'' . $this->createAbsoluteUrl('/') . Yii::app()->request->baseUrl . '\projekktor\swf\StrobeMediaPlayback\StrobeMediaPlayback.swf\',
                playerFlashMP3: \'' . $this->createAbsoluteUrl('/') . Yii::app()->request->baseUrl . '\projekktor\swf\StrobeMediaPlayback\StrobeMediaPlayback.swf\'
               }
               );

         })'
        );


        $this->render('video');
    }
    public function actionTest()
    {
        $this->init()->registerScriptFile(Yii::app()->theme->baseUrl . '/js/testGallery.js');

        $this->render('test');
    }

    public function actionView($id)
    {
        $sql = "SELECT * FROM {{gallery_img}} WHERE album=:id";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam('id', $id);
        $data = $command->queryAll();

        $this->render('view', array('data'=> $data));
    }
    public function actionNewAlbum()
    {

        $model = new Albums();

        if(isset($_POST['Albums'])){
            $model->attributes = $_POST['Albums'];
            if($model->validate()){
                if($model->save()){
                    $this->redirect('/img/add/');
                }
            }
        }

        $this->render('addAlbum', array('model'=>$model));
    }
}