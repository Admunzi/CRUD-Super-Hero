<?php
require_once('../app/config/parametros.php');
require_once('../vendor/autoload.php');

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\SuperheroController;
use App\Controllers\CitizenController;
use App\Controllers\AbilityController;
use App\Controllers\RequestController;

$router = new Router();
$router->add(array(
        'name'=>'home',
        'path'=>'/^\/home$/',
        'action'=>[IndexController::class, 'IndexAction']));
        
$router->add(array(
    'name'=>'EditSuperhero',
    'path'=>'/^\/edit-superhero\/[0-9]{1,3}$/',
    'action'=>[SuperheroController::class, 'EditSuperheroAction']));

$router->add(array(
    'name'=>'DeleteSuperhero',
    'path'=>'/^\/delete-superhero\/[0-9]{1,3}$/',
    'action'=>[SuperheroController::class, 'DeleteSuperheroAction']));

$router->add(array(
    'name'=>'AddSuperhero',
    'path'=>'/^\/add-superhero$/',
    'action'=>[SuperheroController::class, 'AddSuperheroAction']));

$router->add(array(
    'name'=>'hero-abilities',
    'path'=>'/^\/hero-abilities\/[0-9]{1,3}$/',
    'action'=>[AbilityController::class, 'ShowAbilitiesAction']));

$router->add(array(
    'name'=>'delete-ability',
    'path'=>'/^\/delete-ability\/[0-9]{1,3}$/',
    'action'=>[AbilityController::class, 'DeleteAbilityAction']));

$router->add(array(
    'name'=>'request',
    'path'=>'/^\/request\/[0-9]{1,3}$/',
    'action'=>[RequestController::class, 'ShowRequestAction']));
    
// $router->add(array(
//         'name'=>'add-request',
//         'path'=>'/^\/add-request\/[0-9]{1,3}$/',
//         'action'=>[RequestController::class, 'AddRequestAction']));

$router->add(array(
    'name'=>'delete-request',
    'path'=>'/^\/delete-request\/[0-9]{1,3}$/',
    'action'=>[RequestController::class, 'DeleteRequestAction']));

$router->add(array(
    'name'=>'RegisterCitizen',
    'path'=>'/^\/register-citizen$/',
    'action'=>[CitizenController::class, 'RegisterCitizenAction']));

$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
}else{
    echo "No route";
}


?>