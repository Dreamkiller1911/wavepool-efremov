<?php
$this->pageTitle=Yii::app()->name . ' - О нас';
$this->breadcrumbs=array(
	'Немного о нас',
);
$this->init()->registerCssFile(Yii::app()->theme->baseUrl . '/css/about.css');
$this->init()->registerMetaTag('Информация, о нас, бассейн волна', 'keywords');
$this->init()->registerMetaTag('МУНИЦИПАЛЬНОЕ БЮДЖЕТНОЕ  УЧРЕЖДЕНИЕ ДОПОЛНИТЕЛЬНОГО ОБРАЗОВАНИЯ' .
			'«ДЕТСКО-ЮНОШЕСКАЯ СПОРТИВНАЯ ШКОЛА №6 «ВОЛНА»' .
			'Управления по культуре, молодежной политике, физической культуре и спорту' .
			'г.Ефремова – основана 18 декабря 2009 года.' .
			'Директор школы – Чемоданова Мария Владимировна' .
			'Вид спорта – плавание. Основная направленность – спортивная деятельность,' .
			' воспитание волевых и моральных качеств спортсменов, начальное обучение детей' .
			' плаванию и подготовка спортсменов разрядников по виду спорта, подготовка спортивного резерва.', 'description');

$this->init()->registerScriptFile(Yii::app()->theme->baseUrl . '/projekktor/projekktor-1.3.09.js');
$this->init()->registerCssFile(Yii::app()->theme->baseUrl . '/projekktor/themes/maccaco/projekktor.style.css');
$this->init()->registerScript('video',
		'$(document).ready(function() {
               projekktor(\'video\',
               {
               volume: 0.8,
               ratio: \'4/3\',
               controls: true,
                playerFlashMP4: \'' . $this->createAbsoluteUrl('/') . Yii::app()->request->baseUrl . '\projekktor\swf\StrobeMediaPlayback\StrobeMediaPlayback.swf\',
                playerFlashMP3: \'' . $this->createAbsoluteUrl('/') . Yii::app()->request->baseUrl . '\projekktor\swf\StrobeMediaPlayback\StrobeMediaPlayback.swf\'
               }
               );

         })'
);
?>


<div class="row-fluid about" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
	<hr>
	<div class="col-xs-3 hLImg">
		<a href="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/IMG_571e0e20d1896.jpeg">
			<img src="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/prev/IMG_571e0e20d1896.jpeg">
		</a>
		<a href="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/IMG_571e0e21b4021.jpeg">
			<img src="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/prev/IMG_571e0e21b4021.jpeg">
		</a>
	</div>
	<div class="col-xs-6 hImg">
		<a href="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/IMG_5710e663593a7.jpeg">
			<img width="90%" src="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/IMG_5710e663593a7.jpeg">
		</a>
		<div class="row-fluid myQuot"><br>
		<h5>СПОРТ - НЕ ПРЕДМЕТ РОСКОШИ. ЕГО ОТСУТСТВИЕ НИЧЕМ НЕЛЬЗЯ ЗАМЕНИТЬ</h5>
		<p>Пьер де Кубертен</p>
		</div>

	</div>
	<div class="col-xs-3 hRImg">
		<a href="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/IMG_571e0e228fa49.jpeg">
			<img src="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/prev/IMG_571e0e228fa49.jpeg">
		</a>
		<a href="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/IMG_571e0e23531b4.jpeg">
			<img src="<?php echo Yii::getPathOfAlias('baseroot')?>/images/gallery/prev/IMG_571e0e23531b4.jpeg">
		</a>
	</div>

	<div class="row-fluid">
		<div class="col-xs-12">
			<div class="row-fluid text-center">
				<hr>
			<span>
			<h3>МУНИЦИПАЛЬНОЕ БЮДЖЕТНОЕ  УЧРЕЖДЕНИЕ ДОПОЛНИТЕЛЬНОГО ОБРАЗОВАНИЯ<br>
			«ДЕТСКО-ЮНОШЕСКАЯ СПОРТИВНАЯ ШКОЛА №6 «ВОЛНА»</h3><br>
			<h4>Управления по культуре, молодежной политике, физической культуре и спорту
			г.Ефремова – основана 18 декабря 2009 года.<br>
			Директор школы – Чемоданова Мария Владимировна</h4>
			Вид спорта – плавание. Основная направленность – спортивная деятельность, воспитание волевых и моральных качеств спортсменов, начальное обучение детей плаванию и подготовка спортсменов разрядников по виду спорта, подготовка спортивного резерва.
			</span>
			</div>
			<hr>
			<div class="row-fluid text text-justify">
				<p><b class="text-info">Плавательный бассейн "Волна"</b> - это не только современный интерьер и система очистки воды ,
				компьютеризированная
				<a href="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/IMG_571e0e24076ec.jpeg">
					<img align="left" hspace="10px" vspace="10px" translate="yes" src="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/prev/IMG_571e0e24076ec.jpeg">
				</a>
				<a href="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/IMG_571e0e24ab042.jpeg">
					<img align="right" hspace="10px" vspace="10px" translate="yes" src="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/prev/IMG_571e0e24ab042.jpeg">
				</a>
				система водоподготовки и поддержки температурного режима, но и профессиональные тренеры, хорошо понимающие своих
				воспитанников, талантливые ребята, интересные тренировки и красивые спортивные праздники.</p>
					<p>Воспитанники школы – многократные участники и призёры соревнований различного уровня – от школьных до областных и
				всероссийских.</p>
				<a href="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/IMG_571e0e255bec9.jpeg">
					<img align="left" hspace="10px" vspace="10px" translate="yes" src="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/prev/IMG_571e0e255bec9.jpeg">
				</a>
				<a href="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/IMG_571e0e2634a11.jpeg">
					<img align="right" hspace="10px" vspace="10px" translate="yes" src="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/prev/IMG_571e0e2634a11.jpeg">
				</a>
					<p>Занятия с детьми проводят квалифицированные  тренеры-преподаватели. Все они - специалисты высокого класса, а потому
				легко находят общий язык и индивидуальный подход к каждому - и к самому маленькому воспитаннику, делающему первые
				шаги в плавании, и к опытному спортсмену.</p>
					<p>Основными формами учебно-тренировочного процесса в школе являются:  групповые учебно-тренировочные и теоретические
				занятия, , медико-восстановительные мероприятия, медицинский контроль, участие в соревнованиях.</p><br>

				<p class="text-center text-info"><b>Хотите, чтобы ваш ребёнок научился плавать?</b></p>

					<p>Запишите его в секцию детского плавания «ДЮСШ №6 «Волна»,  детей в возрасте от 6 до 14 лет.
				На занятиях проводится обучение и совершенствование плавания детей. Ваши дети научатся плавать,
				умеющие плавать будут совершенствоваться в технике и могут при желании детей и их родителей
				достичь высшего мастерства. Занятия проводятся 2-3 раза в неделю.</p>
				<a href="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/IMG_571e0e255bec9.jpeg">
					<img align="left" hspace="10px" vspace="10px" translate="yes" src="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/prev/IMG_571e0e27015ee.jpeg">
				</a>
				<a href="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/IMG_571e0e27abca6.jpeg">
					<img align="right" hspace="10px" vspace="10px" translate="yes" src="<?php Yii::getPathOfAlias('webroot')?>/images/gallery/prev/IMG_571e0e27abca6.jpeg">
				</a>
					<p>На территории плавательного бассейна расположен тренажерный зал, оснащенный специальным покрытием и спортивным
				оборудованием , имеется оборудование для занятий настольным теннисом. Проводится большая работа по привлечению
				жителей города к регулярным занятиям плаванием.</p>
					<p>«ДЮСШ №6 «Волна» сочетает в себе все лучшее, что есть в индустрии нашего города сегодня, где бы Вы могли провести
				свободное время с комфортом, удовольствием и пользой для здоровья. Мы обучаем  плаванию  как взрослых, так и детей.
				В нашем бассейне у Вас есть возможность обучаться плаванию в индивидуальном порядке.</p><br>

				<div class="row text-center">
					<center>
					<video class="projekktor" width="420" height="420" poster="poster.jpg">
						<source src="/assets/video/volna.mp4"/>

					</center>
				</div>

				<h4 class="text-center text-info">В вашем распоряжении:</h4>
				<p>Ванна бассейна – 25х11 метров  и глубиной от 1,8 до 1,4 метров, 5 плавательных дорожек.</p><br>
				<p>Аквааэробика,Сауна,Тренажерный зал, сейфы для хранения ценных вещей, пункт проката, бесплатная автостоянка.</p><br>
				<p>В здании удобные раздевалки и  душевые. Для тех, кто только учится плавать, есть специальные плавательные доски и пояса.</p><br>
				<p>« ДЮСШ №6 «Волна» оказывает платные услуги бассейна для населения, организует свою деятельность с учётом интересов и потребностей жителей города и района.
				На оказание услуг спортивной направленности заключаются договора с организациями и предприятиями города и района.</p>

				<h3 class="text-center text-info">Мы всегда рады  видеть Вас в нашем бассейне!</h3>
				<p>
				<a href="<?php echo Yii::app()->urlManager->createUrl('/site/page/', array('view'=>'maps'))?>"> Наши координаты:</a>

					<p><b class="text-info">Адресс:</b> <i>31840 Тульская область, г. Ефремов, ул. Тульское шоссе, д. 6</i></p>
					<p><b class="text-info">Телефон/Факс:</b> <i>8 (48741) 5-05-70</i></p>
					<p><b class="text-info">Электронная почта:</b> <i><a href="<?php echo Yii::app()->request->baseUrl?>/site/contact"> Efremov.volna@yandex.ru</a></i></p>

			</div>
		</div>
	</div>
</div>