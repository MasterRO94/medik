<?php defined('MEDIK') or die('Access denied'); ?>
<?php if($page):?>

<h2 class="page_title"><?=$page['title']?></h2>

<div class="kroshki">
    <a href="<?=PATH?>">Главная</a> / <span href="#"><?=$page['title']?></span>
</div><!-- .kroshki -->

<div class="page">

    <?=$page['text']?>

    <?php else: ?>
        <h2 class="page_title">404</h2>
        <p class="availability_n">Такой страницы нет!</p>
    <?php endif; ?>

</div><!-- .page -->
