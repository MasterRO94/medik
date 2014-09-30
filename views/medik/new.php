<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Новинки</h2> <!-- Максимум 2 слова -->

<div class="goods">
<?php if($eyestoppers): ?>
    <?php foreach($eyestoppers as $eyestopper): ?>
        <div class="block_goods">
            <?php if($eyestopper['new']):?>
                <img class="new_img" src="<?=PATH.TEMPLATE?>images/new.png" />
            <?php endif;?>
            <?php if($eyestopper['action']):?>
                <img class="action_img" src="<?=PATH.TEMPLATE?>images/percent.png" />
            <?php endif;?>
            <h2><?=$eyestopper['name']?></h2>
            <a href="?view=product&id_goods=<?=$eyestopper['id_goods']?>"><img src="<?=PRODUCTIMG?><?=$eyestopper['img']?>"></a>
            <a class="more" href="?view=product&id_goods=<?=$eyestopper['id_goods']?>">Подробнее...</a><br/>
            <p class="price">Цена: <span><?=$eyestopper['price']?></span></p>
            <?php if($eyestopper['amount']): ?>
                <span class="availability">Есть в наличии</span>
                <p class="addtocart"><a href="?view=addtocart&id_goods=<?=$eyestopper['id_goods']?>">Добавить в корзину</a></p>
            <?php else: ?>
                <span class="availability availability_n">Нет в наличии</span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <?php else: ?>
        <p class="no_products">Товаров пока нет!</p>

<?php endif; ?>
</div><!-- .goods -->
