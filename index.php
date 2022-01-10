<?php
//<>
require 'vendor/autoload.php';
$router = new AltoRouter();
$router->map('GET', '/', function() {
    require __DIR__ . '/view/index.php';
});
$match = $router->match();
?>