<?php $this->beginContent('/layouts/main'); ?>

    <div class="container-fluid">
        <div class="col-xs-3">

            <?php $this->widget('LastNews') ?>

            <?php $this->widget('Services') ?>

            <?php $this->widget('Documents') ?>

        </div>


        <div class="col-xs-7">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
            <?php echo $content ?>
        </div>


        <div class="col-xs-2" id="secondBlocks">

            <?php if (!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>

            <div class="row fastMenu">
                <?php $this->widget('LastImg') ?>
            </div>
        </div>
    </div>

<?php $this->endContent(); ?>