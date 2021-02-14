<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once('../vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use App\Models\Blog;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'symblog',
    'username'  => 'symblog',
    'password'  => 'symblog',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

//Creamos la variable blogs para recoger las tablas
//$blogs = Blog::all();

/* $route = $_GET['route'] ?? '/';
if($route == '/'){
    require('../index.php');
}
elseif ($route == 'addBlog'){
    require('../addBlog.php');
}
elseif ($route == 'contact'){
    require('../contact.php');
}
elseif ($route == 'about'){
    require('../about.php');
}
elseif ($route == 'show'){
    require('../show.php');
} */

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

//$map->get('index','/','../index.php');
$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
//$map->get('addBlog','/blogs/add','../addBlog.php');
$map->get('addBlog', '/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction'
]);
$map->post('saveBlog', '/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction'
]);
//$map->get('contact','/contact','../contact.php');
$map->get('contact', '/contact', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'contactAction'
]);
//$map->get('contact','/about','../about.php');
$map->get('about', '/about', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'aboutAction'
]);
//$map->get('show','/blogs/show','../show.php');
$map->get('show', '/blogs/show', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'showBlogAction'
]);
$map->get('addUser', '/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);

$map->post('saveUser', '/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if (!$route) {
    echo "No route";
} else {
    //require $route->handler;
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    echo $controller->$actionName($request);
}
