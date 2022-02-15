<?php
//Front Controller
require '../vendor/autoload.php';
require '../app/Config/parametros.php';

use App\Controller\UserController;
use App\Controller\AbilityController;
use App\Controller\CitizenController;
use App\Controller\RequestController;
use App\Controller\SuperheroController;
use App\Core\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$router = new Router();

$router->add(array(
    'name' => 'listSuperheros',
    'path' => '/^\/sh\/list$/',
    'action' => [SuperheroController::class, 'listAction']
));

$router->add(array(
    'name' => 'addSuperhero',
    'path' => '/^\/sh\/add$/',
    'action' => [SuperheroController::class, 'insertAction']
));

$router->add(array(
    'name' => 'editSuperhero',
    'path' => '/^\/sh\/edit\/[0-9]{1,}$/',
    'action' => [SuperheroController::class, 'editAction']
));

$router->add(array(
    'name' => 'deleteSuperhero',
    'path' => '/^\/sh\/del\/[0-9]{1,3}$/',
    'action' => [SuperheroController::class, 'deleteAction']
));

$router->add(array(
    'name' => 'listAbility',
    'path' => '/^\/ability\/list$/',
    'action' => [AbilityController::class, 'listAction']
));

$router->add(array(
    'name' => 'addAbility',
    'path' => '/^\/ability\/add$/',
    'action' => [AbilityController::class, 'insertAction']
));

$router->add(array(
    'name' => 'editAbility',
    'path' => '/^\/ability\/edit\/[0-9]{1,}$/',
    'action' => [AbilityController::class, 'editAction']
));

$router->add(array(
    'name' => 'deleteAbility',
    'path' => '/^\/ability\/del\/[0-9]{1,3}$/',
    'action' => [AbilityController::class, 'deleteAction']
));

$router->add(array(
    'name' => 'listUser',
    'path' => '/^\/user\/list$/',
    'action' => [UserController::class, 'listAction']
));

$router->add(array(
    'name' => 'addUser',
    'path' => '/^\/user\/add$/',
    'action' => [UserController::class, 'insertAction']
));

$router->add(array(
    'name' => 'editUser',
    'path' => '/^\/user\/edit\/[0-9]{1,}$/',
    'action' => [UserController::class, 'editAction']
));

$router->add(array(
    'name' => 'deleteUser',
    'path' => '/^\/user\/del\/[0-9]{1,3}$/',
    'action' => [UserController::class, 'deleteAction']
));

$router->add(array(
    'name' => 'listCitizen',
    'path' => '/^\/citizen\/list$/',
    'action' => [CitizenController::class, 'listAction']
));

$router->add(array(
    'name' => 'addCitizen',
    'path' => '/^\/citizen\/add$/',
    'action' => [CitizenController::class, 'insertAction']
));

$router->add(array(
    'name' => 'editCitizen',
    'path' => '/^\/citizen\/edit\/[0-9]{1,}$/',
    'action' => [CitizenController::class, 'editAction']
));

$router->add(array(
    'name' => 'deleteCitizen',
    'path' => '/^\/citizen\/del\/[0-9]{1,3}$/',
    'action' => [CitizenController::class, 'deleteAction']
));


$router->add(array(
    'name' => 'listRequest',
    'path' => '/^\/request\/list$/',
    'action' => [RequestController::class, 'listAction']
));

$router->add(array(
    'name' => 'addRequest',
    'path' => '/^\/request\/add$/',
    'action' => [RequestController::class, 'insertAction']
));

$router->add(array(
    'name' => 'editRequest',
    'path' => '/^\/request\/edit\/[0-9]{1,}$/',
    'action' => [RequestController::class, 'editAction']
));

$router->add(array(
    'name' => 'deleteRequest',
    'path' => '/^\/request\/del\/[0-9]{1,3}$/',
    'action' => [RequestController::class, 'deleteAction']
));
// $router->add(array(
//     'name' => 'searchSuperhero',
//     'path' => '/^\/sh\/search\/[a-zA-Z]{1,}$/',
//     'action' => [SuperheroController::class, 'searchAction']
// ));

// $router->add(array(
//     'name' => 'registerCiticen',
//     'path' => '/^\/citizen\/regiter$/',
//     'action' => [CitizenController::class, 'registerAction']
// ));

// $router->add(array(
//     'name' => 'insertRequest',
//     'path' => '/^\/request$/',
//     'action' => [RequestController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'insertAbility',
//     'path' => '/^\/ability\/add$/',
//     'action' => [AbilityController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'listPetitions',
//     'path' => '/^\/$/',
//     'action' => [PetitionController::class, 'listAction']
// ));

// $router->add(array(
//     'name' => 'closeRequest',
//     'path' => '/^\/request\/close\/[0-9]{1,}$/',
//     'action' => [RequestController::class, 'closeAction']
// ));
$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "no route";
}
