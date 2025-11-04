<?php
$controller = 'index';


if (isset($_SERVER['PATH_INFO']) && ($uri = str_replace('/', '', $_SERVER['PATH_INFO'])) && !empty($uri)) {
    $controller = $uri;
}

require "controllers/{$controller}.controller.php";
?>