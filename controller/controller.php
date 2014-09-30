<?php

defined('MEDIK') or die('Access denied');

session_start();

// подключение модели
require_once MODEL;

// подключение библиотеки функций
require_once 'functions/functions.php';


if(check_smartphone()){
    header("Refresh: 2; URL= http://m.test-medik.esy.es");
    $mobi = true;
}

// функция формирования списка разделов (левое меню)
function view_catalog($arr,$parent_id = 0) {

    //Условия выхода из рекурсии
    if(empty($arr[$parent_id])) {
        return;
    }
    if($parent_id != 0){
        echo '<ul class="submenu">';
        echo '<li><a href="?view=cat&category='.$parent_id.'">Все товары</a></li>';
    } else{
        echo '<ul>';
    }

    //перебираем в цикле массив и выводим на экран
    for($i = 0; $i < count($arr[$parent_id]);$i++) {
        if($parent_id != 0){
            echo '<li><a href="?view=cat&category='.$arr[$parent_id][$i]['section_id'].'">'
                .$arr[$parent_id][$i]['section_name'].'</a>';
        }else {
            echo '<li id="section_id-'.$arr[$parent_id][$i]['section_id'].'"><a class="nav_title" href="?view=cat&category='.$arr[$parent_id][$i]['section_id'].'">'
            .$arr[$parent_id][$i]['section_name'].'</a>';
        }
        //рекурсия - проверяем нет ли дочерних категорий
        view_catalog($arr,$arr[$parent_id][$i]['section_id']);
        echo '</li>';
    }
    echo '</ul>';

}


// получения массива страниц
$pages = get_pages();

// получение названия новостей
$news = get_news_titles();

// получения массива каталога
$cat = get_catalog();


// регистрация
if($_POST['reg']){
    registration();
    redirect();
}

// авторизация
if($_POST['auth']){
    authorization();
    if($_SESSION['auth']['user']){
        // если пользователь авторизовался
        echo "<p>Добро пожаловать, <span>{$_SESSION['auth']['user']}</span></p>";
        exit;
    }else{
        // если авторизация неудачна
        echo $_SESSION['auth']['error'];
        unset($_SESSION['auth']);
        exit;
    }
}

// выход пользователя
if($_GET['do'] == 'logout'){
    logout();
    redirect();
}

// получение динамичной части шаблона .main -------------------------------------------------------------------------------
    $view = empty($_GET['view']) ? 'new' : $_GET['view'];

    switch($view){
        // новинки
        case('new'):
            $eyestoppers = eyestopper('new');
        break;

        // акции и скидки
        case('action'):
            $eyestoppers = eyestopper('action');
        break;

        case('page'):
            // страницы
            $page_id = abs((int)$_GET['page_id']);
            $page = get_page($page_id);
        break;

        // товары категории
        case('cat'):
            $category = abs((int)$_GET['category']);

                // СОРТИРОВКА
                    // массив параметров сортировки
                    $order_p = array(
                                    'pricea' => array('от дешевых к дорогим', 'price ASC'),
                                    'priced' => array('от дорогих к дешевым', 'price DESC'),
                                    'datea' => array('от старых к новым', '`date` ASC'),
                                    'dated' => array('последние добавления', '`date` DESC'),
                                    'namea' => array('по названию &uarr;', 'name ASC'),
                                    'named' => array('по названию &darr;', 'name DESC'),
                    );
                    $order_get = clear($_GET['order']); // получаем возможный параметр сортировки
                    if(array_key_exists($order_get, $order_p)){
                        $order = $order_p[$order_get][0];
                        $order_db = $order_p[$order_get][1];
                    }else{
                        // по умолчанию сортировка проводится по имени по возрастанию
                        $order = $order_p['namea'][0];
                        $order_db = $order_p['namea'][1];
                    }

                // \ СОРТИРОВКА

            // параметры для постраничной навигации
                $perpage = PERPAGE; // количество товаров на страницу
                if(isset($_GET['page'])){
                    $page = (int)$_GET['page'];
                    if($page < 1){
                        $page =  1;
                    }
                }else{
                    $page = 1;
                }
                $count_goods = count_goods($category); // общее количество товаров
                $pages_count = ceil($count_goods / $perpage); // общее количество страниц
                if(!$pages_count) $pages_count = 1; // минимум 1 страница (не может быть 0 страницы)
                if($page > $pages_count) $page = $pages_count; // страница не может быть больше их количества
                $start_pos = ($page - 1) * $perpage; // начальная позиция для запроса (LIMIT $start_pos, $perpage)

            // получение хлебных крошек
            $cat_name = cat_name($category);
            // получаем массив товаров из модели
            $products = get_products($category, $order_db, $start_pos, $perpage);
        break;

        // добавить в корзину
        case('addtocart'):
            $id_goods = abs((int)$_GET['id_goods']);
            addtocart($id_goods);

            // итоговая сумма
            $_SESSION['total_sum'] = total_sum($_SESSION['cart']);

            // количество товаров + защита от добавления несуществующего ID товара
            total_count();

            redirect();
        break;

        case('cart'):
            /*корзина*/
                // получение способов доставки
                $dostavka = get_dostavka();
                // пересчет корзины
                if(isset($_GET['id'], $_GET['count'])){
                    $id_goods = abs((int)$_GET['id']);
                    $count = abs((int)$_GET['count']);
                    $count = $count - $_SESSION['cart'][$id_goods]['count'];
                    addtocart($id_goods, $count, true);
                    $_SESSION['total_sum'] = total_sum($_SESSION['cart']); // итоговая сумма
                    total_count(); // количество товаров + защита от добавления несуществующего ID товара
                    redirect();
                }

                // удаление товара из корзины
            if(isset($_GET['delete'])){
                $id = abs((int)$_GET['delete']);
                if($id){
                    delete_from_cart($id);
                    redirect();
                }

            }

            if($_POST['order']){
                add_order();
                redirect();
            }else{

            }
        break;

        // регистрация
        case('reg'):
            //
        break;

        // поиск
        case('search'):
            $result_search = search();

            // параметры для постраничной навигации
                $perpage = 20; // количество товаров на страницу
                if(isset($_GET['page'])){
                    $page = (int)$_GET['page'];
                    if($page < 1){
                        $page =  1;
                    }
                }else{
                    $page = 1;
                }
                $count_goods = count($result_search); // общее количество товаров
                $pages_count = ceil($count_goods / $perpage); // общее количество страниц
                if(!$pages_count) $pages_count = 1; // минимум 1 страница (не может быть 0 страницы)
                if($page > $pages_count) $page = $pages_count; // страница не может быть больше их количества
                $start_pos = ($page - 1) * $perpage; // начальный элемент массива
                $end_pos = $start_pos + $perpage; // конечный элемент массива
                if($end_pos > $count_goods) $end_pos = $count_goods;
        break;

        case('product'):
            // отдельный товар
            $goods_id = abs((int)$_GET['id_goods']);
            if($goods_id){
                $goods = get_goods($goods_id);
                $cat_name = cat_name(($goods['category']));
            }
        break;

        case('news'):
            // отдельная новость
            $news_id = abs((int)$_GET['news_id']);
            $news_text = get_news_text($news_id);
        break;

        case('all-news'):
            // все новости
                // параметры для постраничной навигации
                    $perpage = 5; // количество товаров на страницу
                    if(isset($_GET['page'])){
                        $page = (int)$_GET['page'];
                        if($page < 1){
                            $page =  1;
                        }
                    }else{
                        $page = 1;
                    }
                    $count_news = count_news(); // общее количество товаров
                    $pages_count = ceil($count_news / $perpage); // общее количество страниц
                    if(!$pages_count) $pages_count = 1; // минимум 1 страница (не может быть 0 страницы)
                    if($page > $pages_count) $page = $pages_count; // страница не может быть больше их количества
                    $start_pos = ($page - 1) * $perpage; // начальная позиция для запроса (LIMIT $start_pos, $perpage)

            $all_news = get_all_news($start_pos, $perpage);

        break;

        default:
            $view = "new";
            $eyestoppers = eyestopper('new');

    }

// \получение динамичной области шаблона ----------------------------------------------------------------------


// подключени вида
require_once TEMPLATE.'index.php';

