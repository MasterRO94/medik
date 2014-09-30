<?php defined('MEDIK') or die('Access denied'); ?>
<nav class="menu">
    <ul class="fancyNav">
        <li id="home"><a href="<?=PATH?>" class="homeIcon">Главная</a></li>
        <?php if($pages): ?>
            <?php foreach($pages as $item): ?>
                <li id="news"><a href="?view=page&amp;page_id=<?=$item['id']?>"><?=$item['title']?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        <!--<li id="news"><a href="?view=about_us">О нас</a></li>
        <li id="about"><a href="?view=how_to_buy">Как купить</a></li>
        <li id="services"><a href="?view=oplata_dostavka">Оплата и доставка</a></li>
        <li id="contact"><a href="?view=contacts">Контакты</a></li>-->
    </ul>
    <div id="search" class="search_box">
        <form>
            <input type="hidden" name="view" value="search">
            <input type="search" name="search" placeholder="Найти товар на сайте">
            <input type="submit" value="Найти">
        </form>
    </div>
</nav>