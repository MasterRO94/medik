<?php

defined('MEDIK') or die('Access denied');

// подключение модели
require_once MODEL;

// подключение библиотеки функций
require_once 'functions/functions.php';


if(check_smartphone()){
    header("Refresh: 2; URL= http://m.test-medik.esy.es");
    $mobi = true;
}

// подключени вида
require_once TEMPLATE.'index.php';