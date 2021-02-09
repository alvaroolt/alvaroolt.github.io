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
// los parametros de get son nombre de ruta, url, y respuesta
// $map->get("index", "/", "../index.php");
// $map->get("addBlog", "/blogs/add", "../addBlog.php"); TERMINA ESTO

// $route = $_GET["route"] ?? "";

// $matcher = $routerContainer->getMatcher();
// $route = $matcher->match($request);
// if (!$route) {
//     echo "No route";
// } else {
//     require $route->handler;
// }
// var_dump($route);
// echo "Visualización del handler </br>";
// var_dump($route->handler);

$map->get("index", "/", [
    "controller" => "App\Controllers\IndexController",
    "action" => "indexAction"
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
    $response = $controller->$actionName($request);
}

// $blogs = Blog::all();

// $route = $_GET['route'] ?? "/";
// if ($route == "/") {
//     require "../index.php";
// } else if ($route == "addBlog") {
//     require "../addBlog.php";
// } else if ($route == "contact") {
//     require "../contact.php";
// } else if ($route == "about") {
//     require "../about.php";
// } else {
//     echo "No route";
// }
