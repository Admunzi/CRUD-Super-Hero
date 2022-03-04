<?php
require_once('../app/config/parametros.php');
require_once('../vendor/autoload.php');

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\SuperheroController;
use App\Controllers\CitizenController;
use App\Controllers\AbilityController;
use App\Controllers\RequestController;
use App\Controllers\UserController;

session_start();
//SI NO EXISTE profile se le pone invitado
if (!isset($_SESSION['profile'])) {
    $_SESSION['profile'] = "Guest";
    $_SESSION['idProfile'] = 0;
}
    

$router = new Router();
$router->add(array(
    'name'=>'home',
    'path'=>'/^\/home$/',
    'action'=>[IndexController::class, 'IndexAction'],
    'auth'=>['Guest','Hero','SuperHero','Citizen']
));

$router->add(array(
    'name'=>'CerrarSesion',
    'path'=>'/^\/close-session$/',
    'action'=>[UserController::class, 'CloseSessionAction'],
    'auth'=>['Hero','SuperHero','Citizen']
));

$router->add(array(
    'name'=>'EditSuperhero',
    'path'=>'/^\/edit-superhero\/[0-9]{1,3}$/',
    'action'=>[SuperheroController::class, 'EditSuperheroAction'],
    'auth'=>['SuperHero']
));

$router->add(array(
    'name'=>'DeleteSuperhero',
    'path'=>'/^\/delete-superhero\/[0-9]{1,3}$/',
    'action'=>[SuperheroController::class, 'DeleteSuperheroAction'],
    'auth'=>['SuperHero']
));

$router->add(array(
    'name'=>'AddSuperhero',
    'path'=>'/^\/add-superhero$/',
    'action'=>[SuperheroController::class, 'AddSuperheroAction'],
    'auth'=>['SuperHero']
));

$router->add(array(
    'name'=>'hero-abilities',
    'path'=>'/^\/hero-abilities\/[0-9]{1,3}$/',
    'action'=>[AbilityController::class, 'ShowAbilitiesAction'],
    'auth'=>['Guest','Hero','SuperHero','Citizen']
));
    
$router->add(array(
    'name'=>'delete-ability',
    'path'=>'/^\/delete-ability\/[0-9]{1,3}$/',
    'action'=>[AbilityController::class, 'DeleteAbilityAction'],
    'auth'=>['SuperHero','Hero']
));
$router->add(array(
    'name'=>'add-ability',
    'path'=>'/^\/add-ability\/[0-9]{1,3}$/',
    'action'=>[AbilityController::class, 'AddAbilityAction'],
    'auth'=>['SuperHero','Hero']
));

$router->add(array(
    'name'=>'request',
    'path'=>'/^\/request\/[0-9]{1,3}$/',
    'action'=>[RequestController::class, 'ShowRequestAction'],
    'auth'=>['Hero','SuperHero','Citizen']
));
$router->add(array(
    'name'=>'complete-request',
    'path'=>'/^\/complete-request\/[0-9]{1,3}\/[0-9]{1,3}$/',
    'action'=>[RequestController::class, 'CompleteRequestAction'],
    'auth'=>['Hero','SuperHero']
));
    
$router->add(array(
    'name'=>'add-request',
    'path'=>'/^\/add-request\/[0-9]{1,3}$/',
    'action'=>[RequestController::class, 'AddRequestAction'],
    'auth'=>['Citizen']
));

$router->add(array(
    'name'=>'delete-request',
    'path'=>'/^\/delete-request\/[0-9]{1,3}$/',
    'action'=>[RequestController::class, 'DeleteRequestAction'],
    'auth'=>['SuperHero','Hero']
));

$router->add(array(
    'name'=>'RegisterCitizen',
    'path'=>'/^\/register-citizen$/',
    'action'=>[CitizenController::class, 'RegisterCitizenAction'],
    'auth'=>['Guest']
));

$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    //Comprobamos los permisos
    $aAuthProfile = $route['auth'];
    if (!in_array($_SESSION['profile'], $aAuthProfile)) {
        header('Location: /home');
    }else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    echo "No route";
}


?>