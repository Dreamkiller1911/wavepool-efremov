<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 08.04.2016
 * Time: 15:05
 */
class LastNews extends myWidget
{
    public $limit;

    public function init()
    {
        $criteria = new CDbCriteria();
        $criteria->limit = $this->limit != null? $this->limit: 5;
        $model = Post::model()->lastNews()->findAll($criteria);

        $this->render('lastNews', array('model'=>$model));
    }

    public function run()
    {

    }

}