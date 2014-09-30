<?php defined('MEDIK') or die('Access denied'); ?>
<?php if($news_text):?>

<h2 class="page_title"><?=$news_text['title']?></h2>

<div class="kroshki">
    <a href="<?=PATH?>">Главная</a> / <span><?=$news_text['title']?></span>
</div><!-- .kroshki -->

<div class="page">
    <p class="publish_date"><em>Дата публикации:</em><span class="news_date"><?=$news_text['date']?></span></p>
    <?=$news_text['text']?>

    <?php else: ?>
        <h2 class="page_title">404</h2>
        <p class="availability_n">Такой страницы нет!</p>
    <?php endif; ?>

</div><!-- .page -->
