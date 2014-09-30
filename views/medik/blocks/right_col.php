<?php defined('MEDIK') or die('Access denied'); ?>

<aside class="right_col">

    <h2 class="auth_title title">Авторизация</h2>
    <div class="auth side_block">

        <?php if(!isset($_SESSION['auth']['user'])): ?>
            <form action="#" name="auth" method="post">
                <label for="email" > E-mail:</label><br/>
                <input type="email" name="email" id="email" placeholder="mail@gmail.com" required>
                <br/>
                <label for="password">Пароль:</label><br/>
                <input type="password" name="password" id="password" placeholder="Пароль" required>
                <br/>
                <input type="submit" name="auth" id="auth" value="Войти">

                <p class="reg"><a href="?view=reg">Регистрация</a></p>
            </form>
            <?php
                if(isset($_SESSION['auth']['error'])){
                    echo '<p class="error"'. $_SESSION['auth']['error']. '"</p>';
                    unset($_SESSION['auth']);
                }
            ?>
        <?php else: ?>
            <p>Добро пожаловать, <span><?=htmlspecialchars($_SESSION['auth']['user']);?></span></p>
            <a href="?do=logout" class="logout">Выход</a>
        <?php endif; ?>

    </div><!-- .auth .side_block -->

    <h2 class="informer_title  title">Новости</h2>
    <div class="news side_block">
        <?php if($news): ?>
        <ul>
            <?php foreach($news as $item): ?>
            <li>
                <a href="?view=news&amp;news_id=<?=$item['news_id']?>"><span class="news_date"><?=$item['date']?></span><br/><?=$item['title']?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <hr/>
            <p class="all_news"><a href="?view=all-news">Все новости</a></p>
        <?php else: ?>
            <p class="availability_n" align="center">Новостей пока нет!</p>
        <?php endif; ?>
    </div><!-- .news .side_block -->

    <h2 class="informer_title  title">Контакты</h2>
    <div class="contacts side_block">
        <h3>Телефон</h3>
        <p class="phone">+38(057) 716-41-13</p>
        <p class="phone">+38(097) 979-38-29</p>
        <hr/>

        <h3>Адрес</h3>
        <p class="address">г. Харьков, проспект 50 лет СССР, 56/3</p>
        <p class="map"><a href="?view=page&amp;page_id=4">Показать на карте</a></p>
    </div><!-- .auth .side_block -->

</aside> <!-- end .right_col -->