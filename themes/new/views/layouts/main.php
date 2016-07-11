<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/form.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/favicon.ico" rel="icon" type="image/x-icon">

</head>
<body>
<div class="container" style="width: 1180px">
    <div class="row">
        <div class="collapse navbar-collapse navbar-ex-collapse" id="mainMenu">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => '<span class="glyphicon glyphicon-home"></span> Главная', 'url' => array('./')),
                        array(
                            'label' => '<span class="glyphicon glyphicon-info-sign"> </span> Информация <span class="caret"></span>',
                            'url' => array('#'),
                            'linkOptions' => array(
                                'class' => 'dropdown-toggle',
                                'data-toggle' => 'dropdown',
                            ),
                            'items' => array(
                                array('label' => 'О нас <li class="divider"></li>', 'url' => array('site/page/about')),
                                array('label' => 'Сотрудники <li class="divider"></li>', 'url' => array('site/page/personal')),
                                array('label' => 'Контакты <li class="divider"></li>', 'url' => array('site/page/maps')),
                                array('label' => 'Написать нам <li class="divider"></li>', 'url' => array('site/contact')),
                            ),
                            'itemOptions' => array('class' => 'dropdown')),

                        array('label' => '<span class="glyphicon glyphicon-picture"></span> Галерея', 'url' => array('media/index')),
                        array('label' => '<span class="glyphicon glyphicon-envelope"></span> Гостевая', 'url' => array('/guests')),
                        array('label' => '<span class="glyphicon glyphicon-user"></span> Войти', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => '<span class="glyphicon glyphicon-off"></span> Выход ', 'url' => array('site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    )
                , 'htmlOptions' => array('class' => 'nav nav-pills')
                , 'submenuHtmlOptions' => array('class' => 'dropdown-menu')
                , 'encodeLabel' => false
                , 'activeCssClass' => 'active'

                )
            );
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 logoBlock">
            <div class="row">
                <div class="col-xs-8">
                    <div class="row">
                        <div class="col-xs-5">
                            <span id="logo"><div class="row textLogoWave">бассейн</div><div class="row textLogoCity">
                                    г.Ефремов
                                </div></span></div>
                        <div class="col-xs-7" id="schedule">

                            <div class="row-fluid">
                                <span><h4 class="text-center"><b>График работы учреждения для платного посещения</b>
                                    </h4></span>

                                <div>
                                    <table width="100%" align="center">
                                        <tr>
                                            <th></th>
                                            <th>Утро</th>
                                            <th>Вечер</th>
                                        </tr>
                                        <tr align="center">
                                            <th>Пн - Сб</th>
                                            <td>07:00 - 14:00</td>
                                            <td>20:00 - 22:00</td>
                                        </tr>
                                        <tr align="center">
                                            <th>Вс</th>
                                            <td>07:00 - 14:00</td>
                                            <td>20:00 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Последний понедельник месяца - санитарный день</p></td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center" id="homeText">
                        <br>
                        <span>
                            <h4>Муниципальное бюджетное учреждение дополнительного образования<br>
                                Детско-юношеская спортивная школа №6 "Волна" в г. Ефремов</h4>
                        </span>
                    </div>
                </div>
                <div class="col-xs-4" id="logo_img">
                    <div class="imgLogo <?php if(isset($_SERVER['HTTP_REFERER'])) echo ' loadOk'?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row " id="contentBlock">

        <?php echo $content ?>
        <br>
    </div>

    <div class="row text-center">
        <div class="col-xs-12 footerBlock well">
            <div class="col-xs-4 col-xs-offset-4">
                Авторские права &copy; <?php echo date('Y'); ?> ДЮСШ №6 "Волна".<br/>
                Все права защищены.<br/>
                город Ефремов
            </div>
            <div class="col-xs-4">
                Разработчик - КИЦ "Навигатор"<br>
                Компьютерно-информационный центр <a target="_blank" href="http://efremov.bizly.ru/kompyuterniy-remont-i-uslugi/668523-kompyuterno-informacionniy-centr-navigator/">"Навигатор"</a><br>
                г. Ефремов, ул. Ленина, д.32 | <span class="glyphicon glyphicon-phone-alt"></span> 6-53-09
            </div>
        </div>
    </div>


    <script src="<?php echo Yii::app()->theme->baseUrl ?>/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/body.js"></script>
</div>
</body>
</html>