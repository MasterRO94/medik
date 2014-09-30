<?php defined('MEDIK') or die('Access denied'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Интернет магазин медицинских товаров</title>    <link rel="stylesheet" type="text/css" href="<?=PATH.TEMPLATE?>style/main_style.css">
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/jquery.js"></script>
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/hoverIntent.js"></script>
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=PATH.TEMPLATE?>js/main_script.js"></script>
    <script type="text/javascript"> var query = '<?=$_SERVER['QUERY_STRING'];?>'; </script>
    <?php if($mobi){
        echo "<script type='text/javascript'>
        $(document).ready(function(){
            alert('Вы зашли с мобильного устройства, выполняется переход на мобильную версию сайта');
        });
    </script>";
    } ?>
</head>
<body>