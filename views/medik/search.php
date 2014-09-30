<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Результаты поиска</h2>
<?php if($result_search['not_found']): // если ничего не найдено?>
    <?php echo $result_search['not_found'];?>
<?php else: ?>

<div class="product-blocks">
        <?php for($i = $start_pos; $i < $end_pos; $i++): ?>
            <div class="block_goods">
                <h2><?=$result_search[$i]['name']?></h2>
                <a href="?view=product&id_goods=<?=$result_search[$i]['id_goods']?>"><img src="<?=PRODUCTIMG?><?=$result_search[$i]['img']?>"></a>
                <a class="more" href="?view=product&id_goods=<?=$result_search[$i]['id_goods']?>">Подробнее...</a><br/>
                <p class="price">Цена: <span><?=$result_search[$i]['price']?></span></p>
                <?php if($result_search[$i]['amount']): ?>
                    <span class="availability">Есть в наличии</span>
                    <p class="addtocart"><a href="?view=addtocart&id_goods=<?=$result_search[$i]['id_goods']?>">Добавить в корзину</a></p>
                <?php else: ?>
                    <span class="availability availability_n">Нет в наличии</span>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
</div><!-- .product-blocks -->
<?php pagination($page, $pages_count); ?>
<?php endif; ?>

