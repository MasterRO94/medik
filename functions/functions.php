<?php
defined('MEDIK') or die('Access denied');

    // Проверка на мобильное устройство

    function check_smartphone() {

        $phone_array = array('iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
        $agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );

        foreach ($phone_array as $value) {

            if ( strpos($agent, $value) !== false ) return true;

        }

        return false;

    }

    // распчатка массива
    function print_arr($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    // фильтрация входящих данных
    function clear($str){
        $str = mysql_real_escape_string(strip_tags(trim($str)));
        return $str;
    }

    // redirect
    function redirect(){
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        header("Location: $redirect");
        exit;
    }

    // выход пользователя
    function logout(){
        unset($_SESSION['auth']);
    }

    function total_count(){
        $_SESSION['total_count'] = 0;

        foreach($_SESSION['cart'] as $key => $value){
            if(isset($value['price'])){ // если получена цена товара из БД то суммируем кол-во
                $_SESSION['total_count'] += $value['count'];
            }else{ // иначе удаляем такой товар из корзины
                unset($_SESSION['cart'][$key]);
            }
        }
    }

    // добавление в корзину
    function addtocart($id_goods, $count = 1, $f=false){

        if($_SESSION['cart'][$id_goods]){
            // если в массиве уже есть добавляемый товар
            if($_SESSION['cart'][$id_goods]['amount'] > 0 || $f){ // если товар есть в наличии
                $_SESSION['cart'][$id_goods]['count'] += $count;
                $_SESSION['cart'][$id_goods]['amount'] -= $count;
                return $_SESSION['cart'];
            }
            /*if($f){ // если выполняется перерасчет
                if($_SESSION['cart'][$id_goods]['amount'] < 0){
                    $_SESSION['cart'][$id_goods]['count'] = $_SESSION['cart'][$id_goods]['amount'] + $count;
                    $_SESSION['cart'][$id_goods]['amount'] = 0;
                }else{
                    $_SESSION['cart'][$id_goods]['count'] += $count;
                    $_SESSION['cart'][$id_goods]['amount'] -= $count;
                }
                return $_SESSION['cart'];
            }*/
        }else {
            // если товар кладется в корзину впервые
            $_SESSION['cart'][$id_goods]['amount'] = get_amount($id_goods); // получаем количество товара
            $_SESSION['cart'][$id_goods]['count'] = $count;
            $_SESSION['cart'][$id_goods]['amount'] -= $count;
            return $_SESSION['cart'];
        }
    }
    // \добавление в корзину

    // удаление из корзины
    function delete_from_cart($id){
        if($_SESSION['cart']){
            if(array_key_exists($id, $_SESSION['cart'])){
                $_SESSION['total_count'] -= $_SESSION['cart'][$id]['count'];
                $_SESSION['total_sum'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['count'];
                unset($_SESSION['cart'][$id]);
            }
        }
    }
    // \удаление из корзины

    // постраничная навигация
    function pagination($page, $pages_count){
        // проверка, нужна ли постраничная навигация
        if($pages_count < 2){
            return false;
        }

        //echo "<a name=\"pagination\"></a>Страница: $page; Общее количество страниц: $pages_count";
        if($_SERVER['QUERY_STRING']){ // если есть параметры в адресной строке
            foreach($_GET as $key => $value){
                // формиркем стрoку параметров без параметра номера страницы(page) ... он передается в функцию
                if($key != 'page'){
                    $uri .= "$key=$value&amp;";
                }
            }
        }
        // формирование ссылок
            $current_page = "<li class='active_page_link'>".$page."</li>";
            $back = ''; // ссылка НАЗАД
            $forward = ''; // ссылка ВПЕРЕД
            $startpage = ''; // ссылка В НАЧАЛО
            $endpage = ''; // ССЫЛКА В КОНЕЦ
            $page2left = ''; // 2 СТРАНИЦА СЛЕВА
            $page1left = ''; // 1 СТРАНИЦА СЛЕВА
            $page2right = ''; // 2 СТРАНИЦА СПРАВА
            $page1right = ''; // 1 СТРАНИЦА СПРАВА

        if($page > 1){
            $back = "<li><a href=\"?{$uri}page=". ($page-1) ."\">&lt;</a></li>\n";
        }
        if($page < $pages_count){
            $forward = "<li><a href=\"?{$uri}page=". ($page+1) ."\">&gt;</a></li>\n";
        }
        if($page > 3){
            $startpage = "<li><a href=\"?{$uri}page=1\">&laquo;</a></li>";
        }
        if($page < ($pages_count-2)){
            $endpage = "<li><a href=\"?{$uri}page=". ($pages_count) ."\">&raquo</a></li>\n";
        }
        if($page - 2 > 0){
            $page2left = "<li><a href=\"?{$uri}page=". ($page-2) ."\">". ($page-2) ."</a></li>\n";
        }
        if($page - 1 > 0){
            $page1left = "<li><a href=\"?{$uri}page=". ($page-1) ."\">". ($page-1) ."</a></li>\n";
        }
        if($page + 2 <= $pages_count){
            $page2right = "<li><a href=\"?{$uri}page=". ($page+2) ."\">". ($page+2) ."</a></li>\n";
        }
        if($page + 1 <= $pages_count){
            $page1right = "<li><a href=\"?{$uri}page=". ($page+1) ."\">". ($page+1) ."</a></li>\n";
        }


        //формируем вывод навигации
        echo "<ul class=\"page_nav\">\n".$startpage.$back.$page2left.$page1left.$current_page.$page1right.$page2right.$forward.$endpage."\n</ul>";

    }
    // \постраничная навигация