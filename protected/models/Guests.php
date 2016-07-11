<?php

/**
 * This is the model class for table "{{guests}}".
 *
 * The followings are the available columns in table '{{guests}}':
 * @property string $id
 * @property string $date_create
 * @property string $name
 * @property string $email
 * @property string $text
 */
class Guests extends CActiveRecord
{
	public $verifyCode;
	const STATUS_PUBLISHED = 1;
	public function tableName()
	{
		return '{{guests}}';
	}

	public function rules()
	{

		return array(
			array('name, email, text', 'required'),
			array('name', 'length', 'max'=>100),
			array('email', 'length', 'max'=>150),
			array('email', 'email'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('id, date_create, name, email, text', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_create' => 'Дата создания',
			'name' => 'Имя',
			'email' => 'E-Mail',
			'text' => 'Сообщение',
			'verifyCode' => 'Проверочный код'
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if($this->isNewRecord){
			$this->date_create = date(" Y-m-d H:i:s", time());
		}
		return true;
	}


}
