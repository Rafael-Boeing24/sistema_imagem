<?php
session_start();
require '../vendor/autoload.php';
require '../src/routes.php';
require '../src/funcao.php';

$router->run( $router->routes );