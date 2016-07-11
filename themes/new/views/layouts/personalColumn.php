<?php $this->beginContent('/layouts/main'); ?>

    <div class="container-fluid">
        <div class="col-xs-3" >
            <div class="row fastMenu">
                <?php $this->widget('LastNews')?>
            </div>
            <div class="row fastMenu">
                <p> Что то еще</p>
                <ul>
                    <li>Новость первая, какаято там написанная</li>
                    <li>Новость первая, какаято там написанная</li>
                    <li>Новость первая, какаято там написанная</li>
                    <li>Новость первая, какаято там написанная</li>

                </ul>
            </div>
        </div>


        <div class="col-xs-7">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->


            <?php echo $content?>


        </div>


        <div class="col-xs-2" id="secondBlocks">
            <?php if(!Yii::app()->user->isGuest) $this->widget('SiteMenu'); ?>


            <div class="row fastMenu">
                <p> Полезное!</p>
                Ссылка 1
            </div>
        </div>
    </div>

<?php $this->endContent(); ?>