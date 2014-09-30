<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Оформление заказа</h2> <!-- Максимум 2 слова -->
<div class="cart">
    <div class="order_result">
        <?php
        if(isset($_SESSION['order']['result']))
            echo $_SESSION['order']['result'];
        ?>
    </div>
    <?php if($_SESSION['cart']): //проверка корзины, если есть товары ?>
        <div id="content-zakaz">
            <table class="zakaz-maiin-table" border="0" cellspacing="0" cellpadding="0">
                <form method="post" action="">
                    <tr>
                        <td class="z_top">&nbsp;&nbsp;&nbsp;&nbsp;Товар</td>
                        <td class="z_top" align="center">Количество</td>
                        <td class="z_top" align="center">Стоимость</td>
                        <td class="z_top" align="center">&nbsp;</td>
                    </tr>

                    <?php foreach($_SESSION['cart'] as $key => $item): ?>
                        <tr>
                            <td class="z_name">
                                <a href="#"><img src="<?=PRODUCTIMG?><?=$item['img']?>" title="<?=$item['name']?>" /></a>
                                <a href="?view=product&id_goods=<?=$key?>"><?=$item['name']?></a>
                            </td>
                            <td class="z_kol"><input id="id-<?=$key?>" class="kolvo" type="number" value="<?=$item['count']?>" name="" data-amount="<?=$item['amount']?>" /></td>
                            <td class="z_price"><?=$item['price']?></td>
                            <td class="z_del"><a href="?view=cart&delete=<?=$key?>"><img src="<?=PATH.TEMPLATE?>images/delete.png" title="удалить товар из заказа" /></a></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td class="z_bot">&nbsp;&nbsp;&nbsp;&nbsp;Итого:</td>
                        <td class="z_bot" align="center">&nbsp;&nbsp;<?=$_SESSION['total_count']?> шт.</td>
                        <td class="z_bot" colspan="2"  align="center"><?=number_format($_SESSION['total_sum'], 2, ',', ' ');?> грн.</td>
                    </tr>

            </table>

            <div class="sposob-dostavki">
                <h4>Способы доставки:</h4>

                <?php foreach($dostavka as $item):?>
                    <p><input type="radio" id="id_<?=$item['id']?>" name="dostavka" value="<?=$item['id']?>" /> <label for="id_<?=$item['id']?>"><?=$item['name']?></label></p>
                <?php endforeach; ?>

            </div>


            <h3>Информация для доставки:</h3>
            <?php if(!isset($_SESSION['auth']['user'])): // проверка авторизации ?>
                <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
                    <tr class="notauth">
                        <td class="zakaz-txt">*ФИО</td>
                        <td class="zakaz-inpt"><input type="text" name="name" required value="<?=htmlspecialchars($_SESSION['order']['name']); ?>" /></td>
                        <td class="zakaz-prim">Пример: Иванов Сергей Александрович</td>
                    </tr>
                    <tr class="notauth">
                        <td class="zakaz-txt">*Е-mail</td>
                        <td class="zakaz-inpt"><input type="email" name="email" required value="<?=htmlspecialchars($_SESSION['order']['email']); ?>" /></td>
                        <td class="zakaz-prim">Пример: test@mail.ru</td>
                    </tr>
                    <tr class="notauth">
                        <td class="zakaz-txt">*Телефон</td>
                        <td class="zakaz-inpt"><input type="text" name="phone" required value="<?=htmlspecialchars($_SESSION['order']['phone']); ?>" /></td>
                        <td class="zakaz-prim">Пример: 8 937 999 99 99</td>
                    </tr>
                    <tr class="notauth">
                        <td class="zakaz-txt">*Адрес доставки</td>
                        <td class="zakaz-inpt"><input type="text" name="address" required value="<?=htmlspecialchars($_SESSION['order']['address']); ?>" /></td>
                        <td class="zakaz-prim">Пример: г. Москва, пр. Мира, ул. Петра Великого д.19, кв 51.</td>
                    </tr>
                    <tr>
                        <td class="zakaz-txt" style="vertical-align:top;">Примечание </td>
                        <td class="zakaz-txtarea"><textarea name="prim"></textarea></td>
                        <td class="zakaz-prim" style="vertical-align:top;">Пример: Позвоните пожалуйста после 10 вечера,
                            до этого времени я на работе </td>
                    </tr>
                </table>
            <?php else: // если пользователь авторизован?>
                <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="zakaz-txt" style="vertical-align:top;">Примечание </td>
                        <td class="zakaz-txtarea"><textarea name="prim"><?=$_SESSION['order']['name']; ?></textarea></td>
                        <td class="zakaz-prim" style="vertical-align:top;">Пример: Позвоните пожалуйста после 10 вечера,
                            до этого времени я на работе </td>
                    </tr>
                </table>
            <?php endif; // конец проверки авторизации ?>

            <input type="submit" name="order" value="Заказать" />

            <br /><br />

            </form>
        </div>

    <?php else: //если товаров нет ?>
        <p class="empty-cart">Корзина пуста</p>
    <?php endif; ?>
    <?php
    unset($_SESSION['order']);
    ?>

</div>