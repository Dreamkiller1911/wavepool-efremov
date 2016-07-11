<?php

/**
 * This is the model class for table "{{gallery_img}}".
 *
 * The followings are the available columns in table '{{gallery_img}}':
 * @property string $id
 * @property string $url
 * @property string $simple_url
 * @property string $description
 * @property integer $album
 *
 * The followings are the available model relations:
 * @property Albums $album0
 */
class GalleryImg extends CActiveRecord
{

	public function tableName()
	{
		return '{{gallery_img}}';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album', 'numerical', 'integerOnly'=>true),
			array('album', 'in', 'range'=>array('0'), 'not'=>true, 'message'=>'Выберете альбом'),
			array('url, simple_url', 'length', 'max'=>150),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, url, simple_url, description, album', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Album' => array(self::BELONGS_TO, 'Albums', 'album'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Файл изображения',
			'simple_url' => 'Файл изображения',
			'description' => 'Описание',
			'album' => 'Альбом',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('simple_url',$this->simple_url,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('album',$this->album);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function saveImg($file, $data){

		if(count($file['error']) == 1 AND $file['error'][0] == 4){
			return array('error'=>'Вы не выбрали фотографии');
		}else{

			$result = array();

				for ($i = 0; $i < count($file['error']); $i++) {
					$paths = FileCommander::copyFile('/images/gallery/', array(
							'url' => $file['tmp_name'][$i],
							'type' => $file['type'][$i],
					));
					if ($paths) {
						$model = new GalleryImg();
						$model->url = $paths['url'];
						$model->simple_url = $paths['simple_url'];
						$model->album = $data['album'];
						if($model->save()){
							$result['complete'] = true;
							$result['text'] = 'Ошибка подключения к базе данных';
							continue;
						}else {
							$result['complete'] = false;
							break;
						}
					}$result['complete'] = false;; break;
				}
			return $result;


			/*foreach($file as $key){
				foreach ($key as $k => $val){

						return array('complete'=>$k);
					FileCommander::copyFile(Yii::getPathOfAlias('webroot') . '/images/gallery/', array());
				}
			}
			;*/


		}
//		echo '<pre>';
//		var_dump(count($file['error']));
//		var_dump($file);
//		echo '</pre>';die;
	}
}
