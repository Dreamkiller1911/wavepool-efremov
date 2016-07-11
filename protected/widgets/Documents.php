<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 25.04.2016
 * Time: 12:04
 */
class Documents extends myWidget
{
    public $dir = 'documents/';
    public $data = ' Пусто ';
    public $menu = '1';


    public function init(){
        $cs = $this->owner->init();
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/myMiniMenu.js');
        $cs->registerScript('miniMenu', '$(\'.mini-menu\').miniMenu();');

        if($this->getContentDir() != false){
           $menu = $this->generateMenu();
            $this->render('documents', array('menu' => $menu));
        }
        return false;
    }
    protected function getContentDir()
    {
        $path = Yii::getPathOfAlias('webroot') . '/assets/' . $this->dir;

        $catalogs = array();

        if(!file_exists($path)){
            return false;
        }


        $this->data = $this->preparePath($path);
        return true;

    }

    protected function preparePath($path)
    {
        $tmp = scandir($path);

        $arr  = array();

        for( $i = 0, $j = count($tmp); $i < $j; $i++) {

            if($tmp[$i] === '.' || $tmp[$i] === '..' || $tmp[$i] === 'type' || $tmp[$i] === 'nameDir' || $tmp[$i] === 'info.json'){
                continue;

            }else if(is_dir($path . $tmp[$i]) ){
                $newPath  = $path . $tmp[$i] . '/';
                if(file_exists($path . 'info.json')){
                    $info = json_decode(file_get_contents($newPath . 'info.json'));
                }

                $arr[$i]['type'] = 'dir';
                $arr[$i]['nameDir'] = $info->dir->name;

                $arr[$i] += $this->preparePath($newPath);

                /*echo '<pre>';
                var_dump($arr[$i]);
                echo '</pre>';die;*/
            }else{
                $a = $path . $tmp[$i];
                if(file_exists($a)){

                    if(file_exists($path . 'info.json')){
                        $info = json_decode(file_get_contents($path . 'info.json'));
                    }

//                    var_dump($info->files->cen1);die;
                    $sfx = substr(basename($a) ,strripos(basename($a), '.')+1);
                    $name = substr(basename($a) , 0, strripos(basename($a), '.'));
                    $arr[$i] = array(
                        'name'=>$info->files->$name->name,
                        'path' => $a
                    );
                }
            }
        }
        return $arr;
    }
    protected function generateMenu(){
        $data = '<ul class="list-group mini-menu">' . $this->serializeContent($this->data) .'</ul>';

        return $data;
    }
    protected function serializeContent($arr)
    {
        $result = '';
        foreach($arr as $key => $val){
            if(!is_array($val)){
                continue;
            }
            if($val['type'] === 'dir'){
                $result .= '<li class="list-group-item sub"><span class="glyphicon glyphicon-chevron-down"></span> <a href="#">' . $val['nameDir']  . '</a></li>';
                $result .= '<ul class="dis">' . $this->serializeContent($val) .'</ul>';
            }else {
                $result .= '<li class="list-group-item"><a target="_blank" href="' . $this->owner->createUrl('/data/returnData/',
                        array('path' => $val['path'])) . '">' . $val['name'] . '</a></li>';
            }
        }
        return $result;
    }
}