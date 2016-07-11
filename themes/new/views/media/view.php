<?php
$this->pageTitle = Albums::getListAlbum($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Галерея' => '.',
    'Альбом - "' . Albums::getListAlbum($_GET['id']) . '"',
);
$this->init()->registerMetaTag('Просмотр альбома, фото, фотографий, ' . Albums::getListAlbum($_GET['id']), 'keywords');
$this->init()->registerMetaTag(Albums::getListAlbum($_GET['id']) . ' - ' . Albums::model()->findByPk($_GET['id'])->comment, 'description');

?>

<div class="col-xs-12 text-justify">
<?php foreach($data as $key => $val):?>

    <div class="oneImg">
      <a href="<?php echo $val['url']?>" rel="gallery" title="<?php echo $val['description']?>"><img src="<?php echo $val['simple_url']?>" ></a>
    </div>

<?php endforeach;?>
</div>

