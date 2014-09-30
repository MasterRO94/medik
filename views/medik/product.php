<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Описание товара</h2>

<div class="kroshki">
    <?php if(count($cat_name) == 1): ?>
        <a href="/">Каталог товаров</a> / <a href="?view=cat&amp;category=<?=$cat_name[0]['section_id']?>"><?=$cat_name[0]['section_name']?></a> / <span><?=$goods['name']?></span>
    <?php endif; ?>

    <?php if(count($cat_name) == 2): ?>
        <a href="/">Каталог товаров</a> / <a href="?view=cat&amp;category=<?=$cat_name[0]['section_id']?>"><?=$cat_name[0]['section_name']?></a> / <a href="?view=cat&amp;category=<?=$cat_name[1]['section_id']?>"><?=$cat_name[1]['section_name']?></a> / <span><?=$goods['name']?></span>
    <?php endif; ?>

    <?php if(count($cat_name) == 3): ?>
        <a href="/">Каталог товаров</a> / <a href="?view=cat&amp;category=<?=$cat_name[0]['section_id']?>"><?=$cat_name[0]['section_name']?></a> / <a href="?view=cat&amp;category=<?=$cat_name[1]['section_id']?>"><?=$cat_name[1]['section_name']?></a> / <a href="?view=cat&amp;category=<?=$cat_name[2]['section_id']?>"><?=$cat_name[2]['section_name']?></a> / <span><?=$goods['name']?></span>
    <?php endif; ?>
</div><!-- .kroshki -->

<?php if($goods): // если есть запрошенный товар ?>

<div class="product">
    <h1><?=$goods['name']?></h1>
    <div class="product_img">
        <img src="<?=PRODUCTIMG ?><?=$goods['img']?>" alt="<?=$goods['name']?>"/>
    </div>
    <div class="product_description">
        <?=$goods['full_description']?>
    </div>
    <?php if($goods['amount']): ?>
        <span class="availability">Есть в наличии</span>
        <p class="addtocart product_addtocart"><a href="?view=addtocart&id_goods=<?=$goods['id_goods']?>">Добавить в корзину</a></p>
    <?php else: ?>
        <span class="availability availability_n">Нет в наличии</span>
    <?php endif; ?>
</div>
<?php else: ?>
    <p><span class="availability availability_n">Нет запрашиваемого товара!!!</span></p>
<?php endif; ?>