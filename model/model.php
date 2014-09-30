<?php

defined('MEDIK') or die('Access denied');

// каталог - получение массива

    function get_catalog(){
        $query = "SELECT * FROM catalog ORDER BY section_name";

        $result = mysql_query($query) or die(mysql_error());;
        if(!$result) {
            return NULL;
        }
        $cat = array();
        if(mysql_num_rows($result) != 0) {

            //В цикле формируем массив
            for($i = 0; $i < mysql_num_rows($result); $i++) {
                $row = mysql_fetch_array($result,MYSQL_ASSOC);

                //Формируем массив, где ключами являются адишники на родительские категории
                if(empty($cat[$row['parent_id']])) {
                    $cat[$row['parent_id']] = array();
                }
                $cat[$row['parent_id']][] = $row;
            }
            //возвращаем массив
            return $cat;
        }

    }

// \каталог - получение массива


// айстопперы - получение массива

    function eyestopper($eyestopper){
        $query = "SELECT id_goods, name, img, price, `date`, amount, new, `action` FROM goods
                    WHERE visible = '1' AND $eyestopper = '1' ORDER BY `date` DESC LIMIT 20";

        $result = mysql_query($query) or die(mysql_error());

        $eyestoppers = array();

        while($row = mysql_fetch_assoc($result)){
            $eyestoppers[] = $row;
        }

        return $eyestoppers;
    }

// \айстопперы - получение массива


// страницы - получение массива

    function get_pages(){
        $query = "SELECT id, title, `position` FROM page ORDER BY `position`";
        $result = mysql_query($query) or die(mysql_error());

        $pages = array();
        while($row = mysql_fetch_assoc($result)){
            $pages[] = $row;
        }

        return $pages;
    }

// \страницы - получение массива


// страницы - получение отдельной страницы

    function get_page($page_id){
        $query = "SELECT * FROM page WHERE id = $page_id";
        $result = mysql_query($query) or die(mysql_error());

        $get_page = array();
        $get_page = mysql_fetch_assoc($result);

        return $get_page;
    }

// \страницы - получение отдельной страницы


// получения названия новостей

    function get_news_titles(){
        $query = "SELECT news_id, title, DATE_FORMAT(`date`,'%d.%m.%Y') AS date FROM news ORDER BY `date` DESC LIMIT 4";
        $result = mysql_query($query) or die(mysql_error());

        $news = array();
        while($row = mysql_fetch_assoc($result)){
            $news[] = $row;
        }

        return $news;
    }

// \получения названия новостей


// получения полной новости

    function get_news_text($news_id){
        $query = "SELECT news_id, title, DATE_FORMAT(`date`,'%d.%m.%Y') AS date, text FROM news WHERE news_id = $news_id";
        $result = mysql_query($query) or die(mysql_error());

        $news_text = array();
        $news_text = mysql_fetch_assoc($result);

        return $news_text;
    }

// \получения полной новости


// получения всех новостей

    function get_all_news($start_pos, $perpage){
        $query = "SELECT news_id, title, description, DATE_FORMAT(`date`,'%d.%m.%Y') AS date FROM news ORDER BY `date` DESC LIMIT $start_pos, $perpage";
        $result = mysql_query($query) or die(mysql_error());

        $all_news = array();
        while($row = mysql_fetch_assoc($result)){
            $all_news[] = $row;
        }

        return $all_news;
    }

// \получения всех новостей


// получения всех новостей

    function count_news(){
        $query = "SELECT COUNT(news_id) as count_news FROM news";
        $result = mysql_query($query) or die(mysql_error());

        $count_news = mysql_fetch_row($result);

        return $count_news[0];
    }

// \получения всех новостей


// получения количества товаровдля постраничной навигации

    function count_goods($category){
        $query = "(SELECT COUNT(id_goods) as count_goods FROM goods
                        WHERE category = $category AND visible =  '1')
                    UNION
                  (SELECT COUNT(id_goods) as count_goods FROM goods
                        WHERE category IN (
                    (SELECT section_id FROM catalog
                        WHERE parent_id = $category OR parent_id IN (
                            SELECT section_id FROM catalog
                                WHERE parent_id = $category)
                    )
                  )
                    AND visible =  '1'
                  )";

        $result = mysql_query($query) or die(mysql_error());

        while($row = mysql_fetch_assoc($result)){
            if($row['count_goods']) $count_goods = $row['count_goods'];
        }

        return $count_goods;
    }

// \получения количества товаровдля постраничной навигации


// получения массива товаров по категориям

    function get_products($category, $order_db, $start_pos, $perpage){
        $query = "(SELECT id_goods, name, img, short_description, `date`, price, new, `action`, amount FROM goods
                        WHERE category = $category AND visible =  '1')
                    UNION
                  (SELECT id_goods, name, img, short_description, `date`, price, new, `action`, amount FROM goods
                        WHERE category IN (
                    (SELECT section_id FROM catalog
                        WHERE parent_id = $category OR parent_id IN (
                            SELECT section_id FROM catalog
                                WHERE parent_id = $category)
                    )
                  )
                    AND visible =  '1'
                  ) ORDER BY $order_db LIMIT $start_pos, $perpage";



        $result = mysql_query($query) or die(mysql_error());

        $products = array();

        while($row = mysql_fetch_assoc($result)){
            $products[] = $row;
        }

        return $products;

    }

// \получения массива товаров по категориям


// получения названий для хлебніх крох

    function cat_name($category){
        $query = "(SELECT section_id, section_name FROM catalog
                        WHERE section_id =
                            (SELECT parent_id FROM catalog
                                    WHERE section_id =
                                (SELECT parent_id FROM catalog
                                        WHERE section_id = $category)
                            )
                  )
                    UNION
                (SELECT section_id, section_name FROM catalog
                        WHERE section_id =
                            (SELECT parent_id FROM catalog
                                    WHERE section_id = $category)
                  )
                    UNION
                  (SELECT section_id, section_name FROM catalog
                        WHERE section_id = $category)";

        $result = mysql_query($query) or die(mysql_error());

        $catalog_name = array();

        while($row = mysql_fetch_assoc($result)){
            $catalog_name[] = $row;
        }

        return  $catalog_name;
    }

//\получения названий для хлебніх крох


// получаем количество товара на кладе
    function get_amount($id_goods){
        $query = "(SELECT amount FROM goods
                        WHERE id_goods = '$id_goods')";
        $result = mysql_query($query) or die(mysql_error());

        $amount = mysql_fetch_row($result);

        return $amount[0];
    }
// \

// сумма заказов в корзине и создание атрибутов товара

    function total_sum($goods){
        $total_sum = 0;

        //строка товаров
        $str_goods = implode(',', array_keys($goods));
        $query = "SELECT id_goods, name, price, img, amount FROM goods
                    WHERE id_goods IN ($str_goods)";

        $result = mysql_query($query) or die(mysql_error());

        while($row = mysql_fetch_assoc($result)){
            $_SESSION['cart'][$row['id_goods']]['name'] = $row['name'];
            $_SESSION['cart'][$row['id_goods']]['price'] = $row['price'];
            $_SESSION['cart'][$row['id_goods']]['img'] = $row['img'];
            $total_sum += $_SESSION['cart'][$row['id_goods']]['count'] * $row['price'];
        }
        //return number_format($total_sum, 2, ',', ' ');
        return $total_sum;
    }

// \сумма заказов в корзине и создание атрибутов товара


// регистрация пользователей

    function registration(){
        $error = ''; // проверка полей

        $email = trim($_POST['email']);
        $pass = trim($_POST['pass']);
        $name = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);

        if(empty($email)){
            $error .= '<li>Не указан email!</li>';
        }
        if(empty($pass)){
            $error .= '<li>Не указан пароль!</li>';
        }
        if(empty($name)){
            $error .= '<li>Не указано ФИО!</li>';
        }
        if(empty($phone)){
            $error .= '<li>Не указан телефон!</li>';
        }
        if(empty($address)){
            $error .= '<li>Не указан адрес доставки!</li>';
        }

        if(empty($error)){
            // если все поля заполнены
            if(strlen($pass) < 6){
                $_SESSION['reg']['result'] = '<p class="error">Пароль должен быть не меньше 6 символов</p>';
                $_SESSION['reg']['email'] = $email;
                $_SESSION['reg']['name'] = $name;
                $_SESSION['reg']['phone'] = $phone;
                $_SESSION['reg']['address'] = $address;
                return false;
            }
            // если пароль коректен проверяем нет ли такого пользователя уже в БД
            $query = "SELECT customer_id FROM customers WHERE email = '$email' LIMIT 1";
            $result = mysql_query($query) or die(mysql_error());

            $row = mysql_num_rows($result);
            if($row){
                // усли такой email уже есть
                $_SESSION['reg']['result'] = '<p class="error">Пользователь с таким email уже зарагастрирован!</p>';
                $_SESSION['reg']['name'] = $name;
                $_SESSION['reg']['phone'] = $phone;
                $_SESSION['reg']['address'] = $address;
            }else{
                // все ОК - регестрируем
                $pass = md5(sha1($pass));

                $query = "INSERT INTO customers (email, password, name, phone, address)
                            VALUES('" .clear($email). "', '". clear($pass). "', '" .clear($name). "', '" .clear($phone). "', '" .clear($address). "')";
                $result = mysql_query($query) or die(mysql_error());
                if(mysql_affected_rows() > 0){
                    // если запись добавлена
                    $_SESSION['reg']['result'] = '<p class="success">Регистрация прошла успешно!</p>';
                    $_SESSION['auth']['user'] = $_POST['name'];
                    $_SESSION['auth']['email'] = $email;
                    $_SESSION['auth']['customer_id'] = mysql_insert_id();
                }else{
                    $_SESSION['reg']['result'] = "<p class='error'>Что-то пошло не так.... Попробуйте позже.</p>";
                    $_SESSION['reg']['email'] = $email;
                    $_SESSION['reg']['name'] = $name;
                    $_SESSION['reg']['phone'] = $phone;
                    $_SESSION['reg']['address'] = $address;
                }

            }

        }else{
            // если не все поля заполнены
            $_SESSION['reg']['result'] = "<div class='error'>Не заполнены обязательные поля: <ul>$error</ul></div>";
            $_SESSION['reg']['email'] = $email;
            $_SESSION['reg']['name'] = $name;
            $_SESSION['reg']['phone'] = $phone;
            $_SESSION['reg']['address'] = $address;
        }

    }

// \регистрация пользователей


// авторизация пользователей

    function authorization(){
        $email = mysql_real_escape_string(trim($_POST['email']));
        $pass = trim($_POST['password']);

        if(empty($email) || empty($pass)){
            $_SESSION['auth']['error'] = 'Поля Email/Пароль должны быть заполнены!';
        }else{
            // если значения получены
            $pass = md5(sha1($pass));
            $query = "SELECT customer_id, name, email FROM customers WHERE email = '$email' AND password = '$pass'";
            $result = mysql_query($query) or die(mysql_error());

            if(mysql_num_rows($result) == 1){
                // если авторизация успешна
                $row = mysql_fetch_row($result);
                $_SESSION['auth']['customer_id'] = $row[0];
                $_SESSION['auth']['user'] = $row[1];
                $_SESSION['auth']['email'] = $row[2];
            }else{
                // если неверен email/пароль
                $_SESSION['auth']['error'] = 'Email и/или Пароль введены не верно!';
            }
        }
    }

// \авторизация пользователей


// способы доставки

    function get_dostavka(){
        $query = "SELECT * FROM dostavka";
        $result = mysql_query($query) or die(mysql_error());

        $dostavka = array();

        while($row = mysql_fetch_assoc($result)){
            $dostavka[] = $row;
        }

        return $dostavka;
    }

// \способы доставки

/* ОФОРМЛЕНИЕ ЗАКАЗА */
// Добавление заказа
    function add_order(){

        // получаем общие данные для всех(авторизованные и не очень)
        $dostavka_id = (int)$_POST['dostavka'];
            if(!$dostavka_id){
                $dostavka_id = 1;
            }
        $prim = trim($_POST['prim']);
        if($_SESSION['auth']['customer_id']){
            $customer_id = $_SESSION['auth']['customer_id'];
        }else{
            $error = ''; // проверка полей

            $email = trim($_POST['email']);
            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);

            if(empty($email)){
                $error .= '<li>Не указан email!</li>';
            }
            if(empty($name)){
                $error .= '<li>Не указано ФИО!</li>';
            }
            if(empty($phone)){
                $error .= '<li>Не указан телефон!</li>';
            }
            if(empty($address)){
                $error .= '<li>Не указан адрес доставки!</li>';
            }

            if(empty($error)){
                // добавляем гостя в заказчики (но без данных авторизации)
                $customer_id = add_customer($email, $name, $phone, $address);
                if(!$customer_id){ // прекращем выполнения скрипта в случае возникновения ошибки добавления гостя-заказчика
                    return false;
                }
            }else{
                // если не все поля заполнены
                $_SESSION['order']['result'] = "<div class='error'>Не заполнены обязательные поля: <ul>$error</ul></div>";
                $_SESSION['order']['email'] = $email;
                $_SESSION['order']['name'] = $name;
                $_SESSION['order']['phone'] = $phone;
                $_SESSION['order']['address'] = $address;
                $_SESSION['order']['prim'] = $prim;
                return false;
            }
        }
        $_SESSION['order']['email'] = $email;
        save_order($customer_id, $dostavka_id, $prim);
    }
// \Добавление заказа


// Добавления заказчика-гостя
    function add_customer($email, $name, $phone, $address){

        $email = clear($email);
        $name = clear($name);
        $phone = clear($phone);
        $address = clear($address);

        $query = "INSERT INTO customers (name, email, phone, address)
                            VALUES('$email', '$name', '$phone', '$address')";
        $result = mysql_query($query) or die(mysql_error());

        if(mysql_affected_rows() > 0){ // если заказчик-гость добавлен получаем его id
            return mysql_insert_id();
        }else{
            // если произошла ошибка при добавлении
            $_SESSION['order']['result'] = "<p class='error'>Произошла ошибка при регистрации заказа!</p>";
            $_SESSION['order']['email'] = $email;
            $_SESSION['order']['name'] = $name;
            $_SESSION['order']['phone'] = $phone;
            $_SESSION['order']['address'] = $address;
            $_SESSION['order']['prim'] =$_POST['prim'];
            return false;
        }
    }
// \Добавления заказчика-гостя

// Сохранение заказа
    function save_order($customer_id, $dostavka_id, $prim){
        $prim = clear($prim);

        $query = "INSERT INTO orders (`customer_id`, `date`, `dostavka_id`, `prim`)
                    VALUES($customer_id, NOW(), $dostavka_id, '$prim')";
        mysql_query($query) or die(mysql_error());

        if(mysql_affected_rows() == -1){
            // если не получилось сохранить заказ, то удаляем заказчика
            mysql_query("DELETE FROM customers
                        WHERE customer_id = $customer_id AND password = ''");
            return false;
        }

        $order_id = mysql_insert_id(); // ID сoхраненного заказа
        foreach($_SESSION['cart'] as $goods_id => $value){
            // строка необходимых для внесениях значений
            $val .= "($order_id, $goods_id, {$value['count']}),";
        }
        $val = substr($val, 0, -1); // удаляем последнюю запятую

        $query = "INSERT INTO zakaz (order_id, goods_id, `count`)
                    VALUES $val";
        mysql_query($query) or die(mysql_error());

        if(mysql_affected_rows() == -1){
            // если не выгрузился заказ, то удаляем заказчика(customers) и сам заказ(order)
            mysql_query("DELETE FROM orders
                        WHERE order_id = $order_id");
            mysql_query("DELETE FROM customers
                        WHERE customer_id = $customer_id AND password = ''");
            return false;
        }

        // обновляем количество товаров на складе
        foreach($_SESSION['cart'] as $id_goods => $value){
            $query = "UPDATE goods SET amount='{$value['amount']}'
                        WHERE id_goods = $id_goods";
            $result = mysql_query($query) or die(mysql_error());
        }

        if($_SESSION['auth']['email']){
            $email = $_SESSION['auth']['email'];
            $user = $_SESSION['auth']['user'];
        }else{
            $email = $_SESSION['order']['email'];
            $user = $_SESSION['order']['user'];
        }
        send_email($order_id, $email, $user);

        // если заказ выгрузился

        unset($_SESSION['cart']);
        unset($_SESSION['total_sum']);
        unset($_SESSION['total_count']);
        $_SESSION['order']['result'] = '<p class="success">Спасибо за ваш заказ. В близжайшее время с вами свяжется менеджер для согласования заказа.</p>';
        return true;
    }
// \Сохранение заказа

// Отправка уведомления на email
    function send_email($order_id, $email, $user){
        // mail(to, subject, body, header);

        // тема письма
        $subject = "Заказ товара(ов) в интернет магазине";
        // заголовки
        $headers = 'Content-type: text/plain; charset=utf-8\r\n';
        $headers .= "From: MEDIK";
        // тело письма
        $mail_body_user = "Благодарим Вас, {$user}, за заказ! \r\n Номер вашего заказа - {$order_id}\r\n\r\nВы заказали: \r\n";

        $mail_body_admin = "Пользователь {$user}, осуществил заказ! \r\n Номер заказа - {$order_id}\r\n\r\nЗаказанные товары: \r\n";

        //атрибуты товара
        foreach($_SESSION['cart'] as $goods_id => $value){
            $mail_body_user .= "Наименование: {$value['name']}, Цена: {$value['price']}, Количество: {$value['count']} шт.\r\n";
            $mail_body_admin .= "Наименование: {$value['name']}, Цена: {$value['price']}, Количество: {$value['count']} шт.\r\n";
        }
        $mail_body_user .= "\r\nИтого: {$_SESSION['total_count']} товара(ов) на сумму {$_SESSION['total_sum']} грн.";

        $mail_body_admin .= "\r\nИтого: {$_SESSION['total_count']} товара(ов) на сумму {$_SESSION['total_sum']} грн.";

        // отправка писем
        mail($email, $subject, $mail_body_user, $headers);
        mail(ADMIN_EMAIL, $subject, $mail_body_admin, $headers);
    }
// \Отправка уведомления на email

/* КОНЕЦ ОФОРМЛЕНИЕ ЗАКАЗА */

// ПОИСК
    function search(){
        $search = clear($_GET['search']);
        $result_search = array(); // результат поиска

        if(mb_strlen($search, 'UTF-8') < 4){
            $result_search['not_found'] = "<p class='error'>Поисковый запрос должен содержать не менее 4 символов!</p>";
        }else{
            $query = "SELECT id_goods, name, img, short_description, price, new, `action`, amount FROM goods
                        WHERE MATCH(name, short_description, full_description) AGAINST('$search*' IN BOOLEAN MODE) AND visible =  '1'";
            $result = mysql_query($query) or die(mysql_error());

            if(mysql_num_rows($result) > 0){
                while($row = mysql_fetch_assoc($result)){
                    $result_search[] = $row;
                }
            }else{
                $result_search['not_found'] = "<p class='error'>По Вашему запросу ничего не найдено!</p>";
            }
        }

        return $result_search;

    }
// \ПОИСК

// Получение отдельного товара
    function get_goods($goods_id){
        $query = "SELECT * FROM goods WHERE id_goods = $goods_id AND visible = '1'";
        $result = mysql_query($query) or die(mysql_error());

        $goods = array();
        $goods = mysql_fetch_assoc($result);

    return $goods;

    }
// \Получение отдельного товара