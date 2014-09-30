<?php require_once('blocks/head.php'); ?>

<?php require_once('blocks/header.php'); ?>

<?php require_once('blocks/menu.php'); ?>

    <section class="conteiner">

        <?php require_once('blocks/left_col.php'); ?>

        <?php require_once('blocks/right_col.php'); ?>

        <section class="main">

            <?php include($view.'.php'); ?>

        </section>

    </section>

    <?php if($_GET['view'] == 'cart'): ?>
        <section id="window_bg">
            <section id="confirm_window">
                <div class="window_header">
                    <h2>Удаление из корзины <a href="#" class="close_window">Х</a></h2>
                </div>
                <div class="window_content">
                    <p>Вы уверены, что хотите удалить товар <span id="delete_goods_name"></span> из корзины?</p>
                    <p class="buttons"><button class="confirm"><a href="#">Да, удалить</a></button><button class="cancel">Нет</button></p>
                </div>
            </section>
        </section>
    <?php endif; ?>

<?php require_once('blocks/footer.php'); ?>

