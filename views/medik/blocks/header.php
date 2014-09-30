<?php defined('MEDIK') or die('Access denied'); ?>
<?php /*unset($_SESSION['cart']); */?>
<?php /*unset($_SESSION['total_count']);*/ ?>
<?php /*unset($_SESSION['total_sum']);*/ ?>
<section class="wrapper">
    <header class="header">
        <div class="logo_img"><img src="<?=PATH.TEMPLATE?>images/logo.gif" alt="logo"/></div>

        <div class="basket">
            <a href="?view=cart" title="Перейти в корзину">
                <img src="<?=PATH.TEMPLATE?>images/basket.png" alt=""/>
                <p>
                    <?php if($_SESSION['total_count']): ?>
                        В корзине
                        <span class="full"><?=$_SESSION['total_count']?></span> товаров <br/>
                        на сумму <span class="full"><?=number_format($_SESSION['total_sum'], 2, ',', ' ');?></span> грн
                    <?php else: ?>
                        В корзине <br/> <span class="full">0</span> товаров
                    <?php endif; ?>

                </p>
            </a>
        </div>

        <div class="logo">
            <h1><a href="/">Медтехник</a></h1>
            <p>г. Харьков, проспект 50 лет СССР, 56/3,
                <br>
                т. +38(057)716-41-13, +38(097)979-38-29
            </p>
        </div>
    </header>
