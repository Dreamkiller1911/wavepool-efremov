<?php
/* @var $this GuestsController */
/* @var $data Guests */
?>

<div class="row-fluid viewGuests">

    <div class="row">

        <div class="row-fluid">
            <span class="glyphicon glyphicon-user"></span>
            <span class="text-info"><?php echo CHtml::encode($data->name); ?> | </span>
            <span class="text-info"><?php echo CHtml::encode($data->email); ?> | </span>
            <span
                class="small text-muted">(<?php echo CHtml::encode(date("d.m.y G:i", strtotime($data->date_create))) ?>
                )</span>
        </div>

        <div class="row-fluid">
            <div class="col-xs-12 text"><span><?php echo CHtml::encode($data->text); ?></span></div>
        </div>

        <?php
        Yii::app()->clientScript->registerScript('ajaxUpdate',
            "
function update(){
    $.fn.yiiListView.update('viewApproved');
    return false;
}", CClientScript::POS_BEGIN);
        ?>
        <div class="row-fluid">
            <?php echo CHtml::ajaxLink('Утвердить', array('/guests/approved?id='.  $data->id) , array(
                'type' => 'post',
                "success"=>'function(){ update() }',
            ), array('update'=>'#approved'))?>
        </div>
    </div>

</div>