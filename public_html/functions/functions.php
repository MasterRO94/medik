<?php

function check_smartphone() {

$phone_array = array('iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
$agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );

foreach ($phone_array as $value) {

if ( strpos($agent, $value) !== false ) return true;

}

return false;

}