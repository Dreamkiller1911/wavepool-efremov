<?php
$this->pageTitle =Yii::app()->name . ' - Контактная информация';
$this->breadcrumbs = array(
    'Контакты',
)
?>

<div class="container">
    <div class="row">
        <h4>Тут вы найдеты всю контактную информацию и схему проезда</h4>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row well">
                <span class="text-info"><i>Наш адресс:</i></span><br><br>
                <span>31840 Тульская область,<br>г. Ефремов, ул. Тульское шоссе, д. 6
                </span>
                <hr>
                <span> <span class="text-info"><i>Телефон(Факс):</i></span>  8 (48741) 5-05-70</span>
                <hr>
                <span> <span class="text-info"><i>Электронная почта:</i></span>  Efremov.volna@yandex.ru</span>
            </div>
        </div>
    </div>

    <div id="map" style="width: 500px; height: 300px"></div>
</div>

<script type="text/javascript">
    ymaps.ready(init);
    var myMap;
    var myPlacemark;

    function init() {
        myMap = new ymaps.Map("map", {
            center: [53.14896927, 38.08811575],
            zoom: 16
        });
        myPlacemark = new ymaps.Placemark([53.14896927, 38.08811575], {
            hintContent: 'Бассейн "Волна"!',
            balloonContent: 'Содержание'
        });

        myMap.geoObjects.add(myPlacemark);
        myPlacemark.events
            .add('mouseenter', function (e) {
                // Ссылку на объект, вызвавший событие,
                // можно получить из поля 'target'.
                e.get('target').options.set('preset', 'islands#greenIcon');
            })
            .add('mouseleave', function (e) {
                e.get('target').options.unset('preset');
            });
    }


</script>