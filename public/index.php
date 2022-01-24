<?php
//Front Controller
require '../vendor/autoload.php';
require '../app/Config/parametros.php';

use App\Controller\DefaultController;
use App\Core\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$router = new Router();

$router->add(array(
    'name' => 'holaMundo',
    'path' => '/holamundo$/',
    'action' => [DefaultController::class, 'saludaAction']
));

$router->add(array(
    'name' => 'numeros',
    'path' => '/numeros$/',
    'action' => [DefaultController::class, 'numerosAction']
));

$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "no route";
}
