<?php
require 'vendor/autoload.php';
/*
use Aura\Router\RouterContainer;
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();*/
error_reporting(E_ALL);
$router = new AltoRouter();
try {

/*    $map->route('test', '/', function () {
        die("ok");
        var_dump("ok");
    });*/


    $router->map('GET', '/', function () {
        var_dump("router is enabled");

        require __DIR__ . '/view/index.php';
    });

    $match = $router->match();

// call closure or throw 404 status
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] );
    } else {
        // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
} catch (Exception $e) {
    var_dump($e->getMessage());
}
?>