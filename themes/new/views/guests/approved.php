<?php
$this->breadcrumbs = array(
    'Управление комментариями' => '/guests/admin',
    'Утверждение'
);
$this->pageTitle = Yii::app()->name . '  - Утверждение комментариев';

?>
<div id="approved">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView'=> '_viewApproved'
));
?>
</div>


