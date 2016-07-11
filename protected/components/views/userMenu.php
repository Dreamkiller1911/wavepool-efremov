<ul>
	<?php foreach ($data as $key):?>

	<li><?php echo CHtml::link($key['label'],array($key['url'][0])); ?></li>
	<?php endforeach;?>
</ul>