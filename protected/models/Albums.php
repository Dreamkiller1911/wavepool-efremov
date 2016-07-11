<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 07.04.2016
 * Time: 14:44
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $date_create
 * @property integer $last_update
 */
class Albums extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return '{{albums}}';
    }

    public function rules()
    {
        return array(
            array('description', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'id'=>'ID',
            'name'=>'Название альбома',
            'description'=>'Название альбома',
            'date'=>'Дата создания',
        );
    }

    public static function getListAlbum($id = null)
    {

        $list = Albums::model()->findAll();
        $data = array('');
        foreach($list as $key => $val){
            $data[$val->id] = $val->description;
        }
        if($id === null){
            return $data;
        }else{
            return $data[$id];
        }

    }

    public function beforeSave()
    {
        if(!isset($this->id)){
            $this->date_create = time();
            return true;
        }return false;
    }


}