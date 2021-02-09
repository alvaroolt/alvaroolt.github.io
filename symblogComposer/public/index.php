<?php
ini_set("display_errors", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);

require_once "../vendor/autoload.php";

// use App\Models\Blog;
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

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

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$map->get("index", "/", [
    "controller" => "App\Controllers\IndexController",
    "action" => "indexAction"
]);
$map->get("contact", "/contact", [
    "controller" => "App\Controllers\IndexController",
    "action" => "contactAction"
]);
$map->get("show", "/about", [
    "controller" => "App\Controllers\IndexController",
    "action" => "aboutAction"
]);
$map->get("addBlog", "/blogs/add", [
    "controller" => "App\Controllers\BlogsController",
    "action" => "getAddBlogAction"
]);
$map->post("saveBlog", "/blogs/add", [
    "controller" => "App\Controllers\BlogsController",
    "action" => "getAddBlogAction"
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if (!$route) {
    echo "No route";
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData["controller"];
    $actionName = $handlerData["action"];

    $controller = new $controllerName;
    $controller->$actionName($request);

    $response = $controller->$actionName($request);
    // echo $response->getBody();
}
