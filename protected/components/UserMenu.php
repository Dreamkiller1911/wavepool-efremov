<?php

Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
	public function init()
	{
		$this->title=CHtml::encode(Yii::app()->user->name);
		parent::init();
	}

	protected function renderContent()
	{
		$data = $this->generateData();
		if($this->getOwner()->menu != null)$data =  $this->getOwner()->menu;

		$this->render('userMenu', array('data'=>$data));

	}

	protected function generateData()
	{
		$data = array();
		$ctrl = get_class($this->owner);
		switch($ctrl){
			case 'PostController':
				$data[] = array('label' => 'Добавить новость', 'url' => array('post/create'));
				$data[] = array('label' => 'Управление новостями', 'url' => array('post/admin'));
				$data[] = array('label' => 'Утвердить коментарии новостей'. ' (' . Comment::model()->pendingCommentCount . ')', 'url' => array('comment/index'));
				$data[] = array('label' => 'Выход', 'url' => 'site/logout');
				break;
			case 'GuestsController':
				$data[] = array('label' => 'Управление коментариями', 'url' => array('guests/admin'));
				$data[] = array('label' => 'Утвердить коментарии', 'url' => array('guests/approved'));
		}
		return $data;
	}
}