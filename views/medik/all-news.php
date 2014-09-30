<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Все новости</h2>

<div class="kroshki">
    <a href="#">Акушерство и гинекология</a> / <a href="#">Зажимы</a>
</div><!-- .kroshki -->

<div class="page">
    <?php if($all_news):?>
        <?php foreach($all_news as $item): ?>
            <div class="block_news">
                <h2 class="news_title"><a href="?view=news&amp;news_id=<?=$item['news_id']?>"><?=$item['title']?></a></h2>
                <p class="publish_date"><em>Дата публикации:</em><span class="news_date"><?=$item['date']?></span></p>
                <div class="news_description"><?=$item['description']?></div>
                <p><a class="more" href="?view=news&amp;news_id=<?=$item['news_id']?>">Подробнее...</a></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="availability_n">Новостей пока нет!</p>
    <?php endif; ?>

    <?php pagination($page, $pages_count); ?>

</div><!-- .page -->
