<?php
//Front Controller

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

use App\Controller\DefaultController;

$controller = new DefaultController();

if ($_SERVER['PATH_INFO'] == '/saludo')
    $controller->saludaAction();
else if ($_SERVER['PATH_INFO'] == '/numeros')
    $controller->numerosAction();
