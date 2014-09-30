<?php
defined('MEDIK') or die('Access denied');

// домен
define('PATH', 'http://test-medik.esy.es/');

// модель
define('MODEL', 'model/model.php');

// контроллер
define('CONTROLLER', 'controller/controller.php');

// вид
define('VIEW', 'views/');

// админ
define('ADMIN', 'admin/');

//папка с контентом (изображения и т.д.)
define('PRODUCTIMG', PATH.'userfiles/');

// активный шаблон
define('TEMPLATE', VIEW.'medik/');

// сервер БД
define('HOST', 'mysql.hostinger.com.ua');

// пользователь
define('USER', 'u970938169_medik');

// пароль
define('PASS', 'u970938169_medik');

// БД
define('DB', 'u970938169_medik');

// название магазина - title
define('TITLE', 'Медтехник | Медицинский иструмент, шовный материал, лабораторная посуда и не только…');

// email админа
define('ADMIN_EMAIL', 'igoshin18@gmail.com');

// количество товаров на странице
define('PERPAGE', 10);

// папка шаблонов административной части
define('ADMIN_TEMPLATE', 'templates/');

mysql_connect(HOST, USER, PASS) or die('No connect to Server');

mysql_select_db(DB) or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');