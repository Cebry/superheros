<?php
//Front Controller
require '../vendor/autoload.php';
require '../app/Config/parametros.php';

use App\Controller\UserController;
use App\Controller\AbilityController;
use App\Controller\CitizenController;
use App\Controller\RequestController;
use App\Controller\SuperheroController;
use App\Controller\EvolutionController;
use App\Controller\ErrorController;
use App\Core\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

var_dump($_SESSION);

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array('profile' => 'guest');
}

$router = new Router();
// TODO: actualizar para que se muestren habilidades
$router->add(array(
    'name' => 'list superheros',
    'path' => '/^\/$/',
    'action' => [SuperheroController::class, 'listAction'],
    'profiles' => ['guest', 'citizen', 'beginner', 'expert']
));

$router->add(array(
    'name' => 'search superheros',
    'path' => '/^\/sh\/search\?name=\w*$/',
    'action' => [SuperheroController::class, 'searchAction'],
    'profiles' => ['guest', 'citizen', 'beginner', 'expert']
));

$router->add(array(
    'name' => 'register citizen',
    'path' => '/^\/citizen\/register$/',
    'action' => [CitizenController::class, 'registerAction'],
    'profiles' => ['guest']
));

$router->add(array(
    'name' => 'user login',
    'path' => '/^\/login$/',
    'action' => [UserController::class, 'logInAction'],
    'profiles' => ['guest']
));

$router->add(array(
    'name' => 'user logout',
    'path' => '/^\/logout$/',
    'action' => [UserController::class, 'logOutaction'],
    'profiles' => ['citizen', 'beginner', 'expert']
));
// TODO: actualizar
$router->add(array(
    'name' => 'request insert',
    'path' => '/^\/request\/new$/',
    'action' => [RequestController::class, 'insertAction'],
    'profiles' => ['citizen']
));

$router->add(array(
    'name' => 'list requests',
    'path' => '/^\/request\/list$/',
    'action' => [RequestController::class, 'listFromSuperheroIdAction'],
    'profiles' => ['beginner', 'expert']
));

$router->add(array(
    'name' => 'check request done',
    'path' => '/^\/request\/checkDone/',
    'action' => [RequestController::class, 'checkDoneAction'],
    'profiles' => ['beginner', 'expert']
));
// TODO: actualizar para que se inserten habilidades
$router->add(array(
    'name' => 'insert Superhero',
    'path' => '/^\/sh\/register$/',
    'action' => [SuperheroController::class, 'registerAction'],
    'profiles' => ['expert']
));
// TODO: actualizar para que se inserten habilidades
$router->add(array(
    'name' => 'update Superhero',
    'path' => '/^\/sh\/update\/\d+$/',
    'action' => [SuperheroController::class, 'editAction'],
    'profiles' => ['expert']
));

$router->add(array(
    'name' => 'delete Superhero',
    'path' => '/^\/sh\/delete\/\d+$/',
    'action' => [SuperheroController::class, 'deleteAction'],
    'profiles' => ['expert']
));

//TODO: revisar
// $router->add(array(
//     'name' => 'addSuperhero',
//     'path' => '/^\/sh\/add$/',
//     'action' => [SuperheroController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'editSuperhero',
//     'path' => '/^\/sh\/edit\/\d+$/',
//     'action' => [SuperheroController::class, 'editAction']
// ));

// $router->add(array(
//     'name' => 'deleteSuperhero',
//     'path' => '/^\/sh\/del\/\d+$/',
//     'action' => [SuperheroController::class, 'deleteAction']
// ));

// $router->add(array(
//     'name' => 'listAbility',
//     'path' => '/^\/ability\/list$/',
//     'action' => [AbilityController::class, 'listAction']
// ));

// $router->add(array(
//     'name' => 'addAbility',
//     'path' => '/^\/ability\/add$/',
//     'action' => [AbilityController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'editAbility',
//     'path' => '/^\/ability\/edit\/\d+$/',
//     'action' => [AbilityController::class, 'editAction']
// ));

// $router->add(array(
//     'name' => 'deleteAbility',
//     'path' => '/^\/ability\/del\/\d+$/',
//     'action' => [AbilityController::class, 'deleteAction']
// ));

// $router->add(array(
//     'name' => 'listUser',
//     'path' => '/^\/user\/list$/',
//     'action' => [UserController::class, 'listAction']
// ));

// $router->add(array(
//     'name' => 'addUser',
//     'path' => '/^\/user\/add$/',
//     'action' => [UserController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'editUser',
//     'path' => '/^\/user\/edit\/\d+$/',
//     'action' => [UserController::class, 'editAction']
// ));

// $router->add(array(
//     'name' => 'deleteUser',
//     'path' => '/^\/user\/del\/\d+$/',
//     'action' => [UserController::class, 'deleteAction']
// ));

// $router->add(array(
//     'name' => 'listCitizen',
//     'path' => '/^\/citizen\/list$/',
//     'action' => [CitizenController::class, 'listAction']
// ));

// $router->add(array(
//     'name' => 'addCitizen',
//     'path' => '/^\/citizen\/add$/',
//     'action' => [CitizenController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'editCitizen',
//     'path' => '/^\/citizen\/edit\/\d+$/',
//     'action' => [CitizenController::class, 'editAction']
// ));

// $router->add(array(
//     'name' => 'deleteCitizen',
//     'path' => '/^\/citizen\/del\/\d+$/',
//     'action' => [CitizenController::class, 'deleteAction']
// ));


// $router->add(array(
//     'name' => 'listRequest',
//     'path' => '/^\/request\/list$/',
//     'action' => [RequestController::class, 'listAction']
// ));

// $router->add(array(
//     'name' => 'addRequest',
//     'path' => '/^\/request\/add$/',
//     'action' => [RequestController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'editRequest',
//     'path' => '/^\/request\/edit\/[\d+$/',
//     'action' => [RequestController::class, 'editAction']
// ));

// $router->add(array(
//     'name' => 'deleteRequest',
//     'path' => '/^\/request\/del\/\d+$/',
//     'action' => [RequestController::class, 'deleteAction']
// ));

// $router->add(array(
//     'name' => 'listEvolution',
//     'path' => '/^\/evolution\/list$/',
//     'action' => [EvolutionController::class, 'listAction']
// ));

// $router->add(array(
//     'name' => 'addEvolution',
//     'path' => '/^\/evolution\/add$/',
//     'action' => [EvolutionController::class, 'insertAction']
// ));

// $router->add(array(
//     'name' => 'editRequest',
//     'path' => '/^\/evolution\/edit\/\d+$/',
//     'action' => [EvolutionController::class, 'editAction']
// ));

// $router->add(array(
//     'name' => 'deleteEvolution',
//     'path' => '/^\/evolution\/del\/\d+$/',
//     'action' => [EvolutionController::class, 'deleteAction']
// ));

$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    if (array_search($_SESSION['user']['profile'], $route['profiles']) > -1) {
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
} else {
    (new ErrorController)->Error404PageAction();
}
