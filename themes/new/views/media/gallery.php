<?php
$this->pageTitle = 'Галерея - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Галерея'
);
$this->init()->registerMetaTag('Галерея, изображения, фотографии, фото', 'keywords');
$this->init()->registerMetaTag('Бассейн "Волна" в г. Ефремов - Галерея. На этой странице мы делимся с вами нашими фотографиями.' .
                                'Заходите, Вы найдете для себя много интересного', 'description');
?>

<?php $this->widget('Gallery')?>
