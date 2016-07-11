<ul>
    <li><?php echo CHtml::link('Добавить фотографии',array('img/add')); ?></li>
    <li><?php echo CHtml::link('Управление фотографиями',array('img/admin')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
    <li><?php echo CHtml::link('Выход',array('site/logout')); ?></li>
</ul>