<?php defined('MEDIK') or die('Access denied'); ?>

<aside class="left_col">

<h2 class="nav_title  title">Каталог товаров</h2>

<div class="eyestoppers">
    <ul>
        <li><a href="?view=new" class="new">Новинки!</a></li>
        <li><a href="?view=action" class="action">Акции!/Скидки</a></li>
    </ul>
</div>

<nav class="navigation">
<h3>- Разделы каталога -</h3>

<?php view_catalog($cat); ?>

</nav>

</aside> <!-- end .left_col -->