<?php echo $this->beginContent?>
<p> Последние новости</p>
<ul class="lastNews">
    <?php foreach ($model as $key): ?>
        <li>
            <a href="<?php echo $key->getUrl()?>"><?php echo $key->menu_name ?>...<br>
                <i class="text-muted small">
                    <span title="Дата создания" class="glyphicon glyphicon-calendar"></span>
                    <?php echo CHtml::decode(date('d.m.y G:i', $key->create_time)) ?>
                </i>
            </a>


        </li>
    <?php endforeach; ?>

</ul>
<?php echo $this->endContent?>
