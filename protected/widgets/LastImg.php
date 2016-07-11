<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 19.04.2016
 * Time: 11:36
 */
class LastImg extends CWidget
{
    protected $idAlbum;
    protected $prevAlbumId;
    protected $idImg;
    protected $prevImgId = 4;
    protected $dataId = array();

    public function init()
    {
        $data = $this->getImgData();

        $this->render('lastImg', array('data' => $data));
    }


    protected function getImgData()
    {
        $this->getImgList();

        $data = array();
        foreach($this->dataId as $k){
            foreach($k as $key => $val){
                $data[] = GalleryImg::model()->findByPk($val, 'album=:albumId', array(':albumId'=>$key));
            }
        }
        return $data;
    }
    protected function getImgList()
    {
        $numRowsAlbum = Albums::model()->count() - 1;
        while(count($this->dataId) < 3){
            $rand = rand(0, $numRowsAlbum);
            $queryA = 'SELECT id FROM {{albums}} LIMIT :num, 1';
            $commandA = Yii::app()->db->createCommand($queryA);
            $commandA->bindParam(':num', $rand);
            $this->idAlbum  = $commandA->queryScalar();
            $numRowsImg = GalleryImg::model()->count('album = :albumID', array(':albumID' => $this->idAlbum));

            $this->idImg = $this->getImgId($numRowsImg);

            if($this->idImg === $this->prevImgId && $this->prevAlbumId === $this->idAlbum || $this->checkDataId() ){
                while($this->idImg === $this->prevImgId || $this->checkDataId()){
                    $this->idImg = $this->getImgId($numRowsImg);
                }
            }else{
                $this->dataId[] =array($this->idAlbum => $this->idImg);
            }


            $this->prevImgId = $this->idImg;
            $this->prevAlbumId = $this->idAlbum;
        }

        return $this->dataId;
    }
    protected function getImgId($nr)
    {
        $imgId = rand(0, $nr-1);
        $queryI = 'SELECT id FROM {{gallery_img}} WHERE album=:idAlbum  LIMIT :num, 1 ';
        $commandI = Yii::app()->db->createCommand($queryI);
        $commandI->bindParam(':idAlbum', $this->idAlbum, PDO::PARAM_INT);
        $commandI->bindParam(':num', $imgId, PDO::PARAM_INT);
        $commandI->setFetchMode(PDO::FETCH_OBJ);
        $id =  $commandI->queryScalar();
        return $id;
    }
    protected function checkDataId()
    {
        $res = false;
        if($this->dataId != null) {
            foreach ($this->dataId as $key) {
                if(array_key_exists($this->idAlbum, $key)) {
                    if ($key[$this->idAlbum] === $this->idImg) {
                        $res = true;
                        break;
                    }
                }
            }
        }
        return $res;
    }

}