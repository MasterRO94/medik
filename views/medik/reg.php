<?php defined('MEDIK') or die('Access denied'); ?>
<h2 class="page_title">Регистрация</h2> <!-- Максимум 2 слова -->
<div class="content-txt">
    <form method="post" action="#">
        <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="zakaz-txt">*E-mail</td>
                <td class="zakaz-inpt"><input type="email" name="email" required value="<?=htmlspecialchars($_SESSION['reg']['email'])?>" /></td>
                <td class="zakaz-prim"></td>
            </tr>
            <tr>
                <td class="zakaz-txt">*Пароль</td>
                <td class="zakaz-inpt"><input type="password" name="pass" required/></td>
                <td class="zakaz-prim">Не менее 6 символов</td>
            </tr>
            <tr>
                <td class="zakaz-txt">*ФИО</td>
                <td class="zakaz-inpt"><input type="text" name="name" required value="<?=htmlspecialchars($_SESSION['reg']['name'])?>" /></td>
                <td class="zakaz-prim">Пример: Иванов Сергей Александрович</td>
            </tr>
            <tr>
                <td class="zakaz-txt">*Телефон</td>
                <td class="zakaz-inpt"><input type="text" name="phone" required value="<?=htmlspecialchars($_SESSION['reg']['phone'])?>" /></td>
                <td class="zakaz-prim">Пример: 098 134 57 82</td>
            </tr>
            <tr>
                <td class="zakaz-txt">*Адрес доставки</td>
                <td class="zakaz-inpt"><input type="text" name="address" required value="<?=htmlspecialchars($_SESSION['reg']['address'])?>" /></td>
                <td class="zakaz-prim">Пример: г. Харьков, пр. Гагарина, д.19, кв 51.</td>
            </tr>
        </table>
        <input type="submit" name="reg" value="Зарегистрироваться" />

        <?php
        if(isset($_SESSION['reg']['result'])){
            echo $_SESSION['reg']['result'];
            unset($_SESSION['reg']);
        }
        ?>

    </form>

</div> <!-- .content-txt -->