<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 04.04.2016
 * Time: 15:53
 */
class Gallery extends CWidget
{
    protected $album;
    protected $albumDb;
    public function init()
    {
        $this->getAlbumDir();//Сканируем папку с галереей
        $this->getAlbumDB();
        /*$this->compareAlbumData();*/

        $data = $this->formAlbumList();
        $this->render('_list_albums', array('data' => $data));

    }

    public function run()
    {

    }
    protected function getAlbumDir()
    {
        $pathGallery = Yii::getPathOfAlias('webroot') . '/images/gallery/';
        $albums = array();
        if(file_exists($pathGallery)){
            $listAlbums = scandir($pathGallery);
            if(count($listAlbums) > 2){
                foreach($listAlbums as $key => $val){
                    if($val != '.' && $val != '..'){
                        $albums[] = $val;
                    }
                }
            }
        };
        return $this->album = $albums;

    }

    protected function formAlbumList()//Формируем список альбомов
    {
        $item = array();
        foreach($this->albumDb as $key => $val){
            $firstImg = $this->getFirstImg($val['id']);
            $item[] = '<a href="view?id=' . $val['id'] . '"><img src="' . $firstImg['simple_url'] . '" height="150px" title="' . $val['description'] . '"/></a>
            <br><span> ' . $val['description'] . ' </span> ';
        }
        return $item;

    }

    protected function getAlbumDB()
    {
        $connection = Yii::app()->db;
        $sql = 'SELECT * FROM {{albums}}';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        $this->albumDb =  $data;
    }

   /* protected function compareAlbumData()
    {
        $arr = array();
        $a1 = $this->album;
        $a2 = $this->albumDb;
        foreach($a2 as $key => $val){

        }
    }*/
    protected  function getFirstImg($album_id)//Выбираем изображение для альбома
    {
        $sql = 'SELECT simple_url FROM {{gallery_img}} WHERE album=:album_id';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam('album_id', $album_id);
        $data = $command->queryAll();
        return array('simple_url'=>$data[array_rand($data)]['simple_url']);

    }
}