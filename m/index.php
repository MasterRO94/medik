<?php

// запрет прямого обращения
define('MEDIK', TRUE);

// подключение файла конфигурации
require_once '../config.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Интернет магазин медицинских товаров</title>
    <link rel="stylesheet" type="text/css" href="<?=PATH.TEMPLATE?>style/main_style.css">
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/jquery.js"></script>
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/hoverIntent.js"></script>
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/main_script.js"></script>
    <?php if($mobi){
        echo "<script type='text/javascript'>
        $(document).ready(function(){
            alert('Вы зашли с мобильного устройства, выполняется переход на мобильную версию сайта');
        });
    </script>";
    } ?>
</head>
<body>

<section class="wrapper">
<header class="header">
    <div class="logo_img"><img src="<?=PATH.TEMPLATE?>images/logo.gif" alt="logo"/></div>

    <div class="basket">
        <a href="#" title="Перейти в корзину">
            <img src="<?=PATH.TEMPLATE?>images/basket.png" alt=""/>
            <p>В корзине <br/> <span class="full">0</span> товаров</p>
        </a>
    </div>

    <div class="logo">
        <h1><a href="#">Медтехник</a></h1>
        <p>г. Харьков, проспект 50 лет СССР, 56/3,
            <br>
            т. +38(057)716-41-13, +38(097)979-38-29
        </p>
    </div>
</header>

<nav class="menu">
    <ul class="fancyNav">
        <li id="home"><a href="/" class="homeIcon">Главная</a></li>
        <li id="news"><a href="#news">О нас</a></li>
        <li id="about"><a href="#about">Как купить</a></li>
        <li id="services"><a href="#services">Оплата и доставка</a></li>
        <li id="contact"><a href="#contact">Контакты</a></li>
    </ul>
</nav>

<section class="conteiner">

<aside class="left_col">

<h2 class="nav_title  title">Каталог товаров</h2>

<div class="eyestoppers">
    <ul>
        <li><a href="#" class="new">Новинки!</a></li>
        <li><a href="#" class="action">Акции!/Скидки</a></li>
    </ul>
</div>

<nav class="navigation">
<h3>- Разделы каталога -</h3>
<ul>
<li>
    <a href="#" class="nav_title">Акушерство и гинекология</a>
    <ul class="submenu">
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2 Абракадабра швабра</a></li>
            </ul>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Дезинфицирующие средства</a>
    <ul class="submenu">
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Диагностика</a>
    <ul class="submenu">
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Подраздел 1</a>
            <ul class="submenu2">
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
                <li><a href="/">Подраздел 2</a></li>
            </ul>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Зажимы</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Инструмент медицинский</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Контрольные материалы</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Костыли трости</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Лаборатория: стекло, реактивы</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Лабораторная посуда пластик</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Лабораторное оборудование</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Мебель</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Медицинский инструмент</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Оборудование для стерилизации</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Общая хирургия</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Перевязка</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Расходный материал</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Реактивы и кислоты</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Термометры Ареометры</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Тест-реагенты и быстрые тесты</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Физиотерапия</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Хозяйственные товары</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
<li>
    <a href="#" class="nav_title">Шовный материал</a>
    <ul class="submenu">
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
        <li><a href="/">Подраздел 1</a></li>
    </ul>
</li>
</ul>
</nav>

</aside> <!-- end .left_col -->

<aside class="right_col">

    <h2 class="auth_title title">Авторизация</h2>
    <div class="auth side_block">
        <form id="auth" action="#" name="auth" method="post">
            <label for="email" > E-mail:</label><br/>
            <input type="email" name="email" id="email" placeholder="mail@gmail.com" required>
            <br/>
            <label for="password">Пароль:</label><br/>
            <input type="password" name="password" id="password" placeholder="Пароль" required>
            <br/>
            <input type="submit" value="Войти">
        </form>
    </div>

    <h2 class="informer_title  title">Новости</h2>
    <div class="news side_block">
        <ul>
            <li>
                <a href="#"><span class="news_date">21.05.2014</span><br/>Новая поставка товаров</a>
            </li>
            <li>
                <a href="#"><span class="news_date">21.05.2014</span><br/>Новая поставка товаров</a>
            </li>
            <li>
                <a href="#"><span class="news_date">21.05.2014</span><br/>Новая поставка товаров</a>
            </li>
            <li>
                <a href="#"><span class="news_date">21.05.2014</span><br/>Новая поставка товаров</a>
            </li>
            <li>
                <a href="#"><span class="news_date">21.05.2014</span><br/>Новая поставка товаров</a>
            </li>
        </ul>
        <hr/>
        <p class="all_news"><a href="#">Все новости</a></p>
    </div>

    <h2 class="informer_title  title">Контакты</h2>
    <div class="contacts side_block">
        <h3>Телефон</h3>
        <p class="phone">+38(057) 716-41-13</p>
        <p class="phone">+38(097) 979-38-29</p>
        <hr/>

        <h3>Адрес</h3>
        <p class="address">г. Харьков, проспект 50 лет СССР, 56/3</p>
        <p class="map"><a href="#">Показать на карте</a></p>
    </div>

</aside> <!-- end .right_col -->

<section class="main">
    <h2 class="page_title">Новинки</h2> <!-- Максимум 2 слова -->

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper neque purus, ac laoreet diam aliquam sed. Etiam posuere eu dolor at rhoncus. Nam blandit elit quam, id blandit augue pharetra vel. Suspendisse potenti. Nunc eget erat tortor. Vivamus vehicula sem libero, vitae eleifend dolor faucibus et. Praesent sit amet porta nibh. Sed quis enim id mauris ultricies imperdiet.</p>

    <p>In consequat blandit consectetur. Fusce id semper lacus. Etiam vulputate suscipit convallis. Donec malesuada hendrerit dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in tristique massa. Nulla facilisi. Aliquam facilisis, arcu nec consequat ultricies, odio augue lobortis ipsum, ut mollis augue arcu sit amet lorem.</p>

    <p>Donec posuere sed sem id fringilla. Nullam ac tortor nec est fermentum aliquet sed a arcu. Proin condimentum mauris magna, id bibendum libero pharetra sit amet. Aliquam porta dolor pulvinar feugiat dictum. Praesent tincidunt vestibulum porttitor. Vestibulum tristique iaculis fringilla. Sed euismod vel dui quis vestibulum.</p>

    <p>Maecenas lobortis at risus quis sodales. Curabitur sapien eros, iaculis ut diam sit amet, sodales dignissim ipsum. Ut eget velit rhoncus, rhoncus augue id, mattis nunc. Pellentesque leo enim, venenatis quis sagittis sed, adipiscing at arcu. Praesent vestibulum ultrices erat eu ullamcorper. Vivamus porta ipsum vitae augue hendrerit gravida. Integer venenatis justo sed risus porttitor, in auctor ligula cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In orci turpis, faucibus vitae dolor in, varius egestas orci.</p>

    <p>Nullam tincidunt sed mauris vestibulum sagittis. Nunc eget leo ullamcorper, porttitor dui non, tristique erat. Mauris sit amet vulputate sem, eu blandit felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed et porta sapien. Quisque tempor nisi tincidunt velit pellentesque, nec lobortis nulla tincidunt. Donec in laoreet libero. Aenean quis odio vitae nunc consectetur tempor porta id eros. Morbi aliquam volutpat elit, at pulvinar dui bibendum non. Cras non neque eu tortor semper feugiat.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper neque purus, ac laoreet diam aliquam sed. Etiam posuere eu dolor at rhoncus. Nam blandit elit quam, id blandit augue pharetra vel. Suspendisse potenti. Nunc eget erat tortor. Vivamus vehicula sem libero, vitae eleifend dolor faucibus et. Praesent sit amet porta nibh. Sed quis enim id mauris ultricies imperdiet.</p>

    <p>In consequat blandit consectetur. Fusce id semper lacus. Etiam vulputate suscipit convallis. Donec malesuada hendrerit dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in tristique massa. Nulla facilisi. Aliquam facilisis, arcu nec consequat ultricies, odio augue lobortis ipsum, ut mollis augue arcu sit amet lorem.</p>

    <p>Donec posuere sed sem id fringilla. Nullam ac tortor nec est fermentum aliquet sed a arcu. Proin condimentum mauris magna, id bibendum libero pharetra sit amet. Aliquam porta dolor pulvinar feugiat dictum. Praesent tincidunt vestibulum porttitor. Vestibulum tristique iaculis fringilla. Sed euismod vel dui quis vestibulum.</p>

    <p>Maecenas lobortis at risus quis sodales. Curabitur sapien eros, iaculis ut diam sit amet, sodales dignissim ipsum. Ut eget velit rhoncus, rhoncus augue id, mattis nunc. Pellentesque leo enim, venenatis quis sagittis sed, adipiscing at arcu. Praesent vestibulum ultrices erat eu ullamcorper. Vivamus porta ipsum vitae augue hendrerit gravida. Integer venenatis justo sed risus porttitor, in auctor ligula cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In orci turpis, faucibus vitae dolor in, varius egestas orci.</p>

    <p>Nullam tincidunt sed mauris vestibulum sagittis. Nunc eget leo ullamcorper, porttitor dui non, tristique erat. Mauris sit amet vulputate sem, eu blandit felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed et porta sapien. Quisque tempor nisi tincidunt velit pellentesque, nec lobortis nulla tincidunt. Donec in laoreet libero. Aenean quis odio vitae nunc consectetur tempor porta id eros. Morbi aliquam volutpat elit, at pulvinar dui bibendum non. Cras non neque eu tortor semper feugiat.</p>

</section>

</section>

<footer class="footer">
</footer>
</section>

</body>
</html>