<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a[href*="' . Yii::app()->request->baseUrl . '/images/gallery"]',
        'config'=>array(
            'overlayOpacity' => 0.9,
            'overlayColor' => 'ff2',
            'hideOnContentClick' => true,
            'titlePosition' => 'over',
        ),
    )
);?>
<p>Случайные фото</p>
<ul class="lastImg">
   <?php foreach($data as $key):?>
       <div class="row-fluid text-center">
       <a href="<?php echo $key->url?>" rel="lastImg"><img class="img-thumbnail" src="<?php echo $key->simple_url?>"></a>
       </div><hr>

    <?php endforeach;?>


</ul>