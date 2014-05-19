<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Интернет магазин медицинских товаров</title>
    <link rel="stylesheet" type="text/css" href="<?=PATH.TEMPLATE?>style/main_style.css">
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/jquery.js"></script>
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
    <header>
    </header>
    <nav>
        <ul class="fancyNav">
            <li id="home"><a href="#home" class="homeIcon">Главная</a></li>
            <li id="news"><a href="#news">О нас</a></li>
            <li id="about"><a href="#about">Как купить</a></li>
            <li id="services"><a href="#services">Оплата и доставка</a></li>
            <li id="contact"><a href="#contact">Контакты</a></li>
        </ul>
    </nav>
    <section class="left_col">
    </section>
    <section class="main">
    </section>
</section>
<footer>
</footer>
</body>
</html>