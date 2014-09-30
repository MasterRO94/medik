<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Каталог товаров</h2>

<div class="kroshki">
    <?php if(count($cat_name) == 1): ?>
        <a href="/">Каталог товаров</a> / <span><?=$cat_name[0]['section_name']?></span>
    <?php endif; ?>

    <?php if(count($cat_name) == 2): ?>
        <a href="/">Каталог товаров</a> / <a href="?view=cat&amp;category=<?=$cat_name[0]['section_id']?>"><?=$cat_name[0]['section_name']?></a> / <span><?=$cat_name[1]['section_name']?></span>
    <?php endif; ?>

    <?php if(count($cat_name) == 3): ?>
        <a href="/">Каталог товаров</a> / <a href="?view=cat&amp;category=<?=$cat_name[0]['section_id']?>"><?=$cat_name[0]['section_name']?></a> / <a href="?view=cat&amp;category=<?=$cat_name[1]['section_id']?>"><?=$cat_name[1]['section_name']?></a> / <span><?=$cat_name[2]['section_name']?></span>
    <?php endif; ?>
</div><!-- .kroshki -->



<div class="vid-sort">
    Вид:
    <a href="#" id="grid" class="grid_list">
        <img src="<?=PATH.TEMPLATE?>images/display-table<?php if($_COOKIE['display'] != "grid") echo "-null"; ?>.png" title="Показать блоками" alt="табличный вид" />
    </a>&nbsp;
    <a href="#" id="list" class="grid_list">
        <img src="<?=PATH.TEMPLATE?>images/display-list<?php if($_COOKIE['display'] != "list") echo "-null"; ?>.png" title="Показать списком" alt="линейный вид" />
    </a>
    &nbsp;&nbsp;
    Сортировать:&nbsp;
    <a href="#" id="order_param"><?=$order?></a>
    <div class="sort-wrap">
        <?php foreach($order_p as $key => $value): ?>
            <?php if($value[0] == $order) continue; ?>
            <a href="?view=cat&amp;category=<?=$category?>&amp;order=<?=$key?>&amp;page=<?=$page?>"><?=$value[0]?></a>
        <?php endforeach; ?>
    </div>
</div>


<?php if($products): ?>
<div class="product-blocks">
    <!-- Табличный вид -->
    <?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == "grid"): ?>
        <?php foreach($products as $product): ?>
            <div class="block_goods">
                <?php if($product['new']):?>
                    <img class="new_img" src="<?=PATH.TEMPLATE?>images/new.png" />
                <?php endif;?>
                <?php if($product['action']):?>
                    <img class="action_img" src="<?=PATH.TEMPLATE?>images/percent.png" />
                <?php endif;?>

                <h2><?=$product['name']?></h2>
                <a href="?view=product&id_goods=<?=$product['id_goods']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>"></a>
                <a class="more" href="?view=product&id_goods=<?=$product['id_goods']?>">Подробнее...</a>
                <p class="price">Цена: <span><?=$product['price']?></span></p>
                <?php if($product['amount']): ?>
                    <span class="availability">Есть в наличии</span>
                    <p class="addtocart"><a href="?view=addtocart&id_goods=<?=$product['id_goods']?>">Добавить в корзину</a></p>
                <?php else: ?>
                    <span class="availability availability_n">Нет в наличии</span>
                <?php endif; ?>
            </div> <!-- .block_goods -->
        <?php endforeach; ?>
    <!-- Табличный вид -->
    <?php else: ?>
    <!-- Линейный вид -->
        <?php foreach($products as $product): ?>
            <div class="list_goods">
                <?php if($product['new']):?>
                    <img class="new_img" src="<?=PATH.TEMPLATE?>images/new.png" />
                <?php endif;?>
                <?php if($product['action']):?>
                    <img class="action_img" src="<?=PATH.TEMPLATE?>images/percent.png" />
                <?php endif;?>
                <a class="link_img" href="?view=product&id_goods=<?=$product['id_goods']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>"></a>
                <h2><?=$product['name']?></h2>
                <div class="short_description"><?=$product['short_description']?></div>
                <a class="more" href="?view=product&id_goods=<?=$product['id_goods']?>">Подробнее...</a>
                <p class="price">Цена: <span><?=$product['price']?></span></p>
                <?php if($product['amount']): ?>
                    <span class="availability">Есть в наличии</span>
                    <p class="addtocart"><a href="?view=addtocart&id_goods=<?=$product['id_goods']?>">Добавить в корзину</a></p>
                <?php else: ?>
                    <span class="availability availability_n">Нет в наличии</span>
                <?php endif; ?>
                <br class="clear" />
            </div><!-- .list_goods -->
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Линейный вид -->
    <?php else: ?>
        <p class="availability_n">Товаров пока нет!</p>

    <?php endif; ?>
</div><!-- .product-blocks -->

<?php pagination($page, $pages_count); ?>

