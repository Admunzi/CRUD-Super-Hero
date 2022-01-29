<?php
require_once('../app/config/parametros.php');
require_once('../vendor/autoload.php');

use App\Core\Router;
use App\Controllers\IndexController;

$router = new Router();
$router->add(array(
        'name'=>'home',
        'path'=>'/^\/home$/',
        'action'=>[IndexController::class, 'IndexAction']));

$router->add(array(
        'name'=>'add',
        'path'=>'/^\/add$/',
        'action'=>[IndexController::class, 'addAction']));
    
$router->add(array(
        'name'=>'del',
        'path'=>'/^\/del\/[0-9]{1,3}$/',
        'action'=>[IndexController::class, 'delAction']));

$router->add(array(
        'name'=>'edit',
        'path'=>'/^\/edit\/[0-9]{1,3}$/',
        'action'=>[IndexController::class, 'editAction']));

$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);
// echo "<pre>";
// var_dump($router);
// echo "</pre>";


// NO VA EL ADD
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
}else{
    echo "No route";
}


?>