<?php

//Запрет прямого обращения
define('MEDIK', TRUE);

// Подключение файла конфигурации

require_once '../config.php';

// получение динамической части шаблона
$view = empty($_GET['view']) ? 'pages' : $_GET['view'];

switch($view){
    case('pages'):
        // страницы
    break;

    default:
    $view = 'pages';
}

// HEADER
include ADMIN_TEMPLATE.'header.php';

// LEFTBAR
include ADMIN_TEMPLATE.'leftbar.php';

// CONTENT
include ADMIN_TEMPLATE.$view.'.php';

?>