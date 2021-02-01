<?php
ini_set("display_errors", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);

require_once "../vendor/autoload.php";

// use App\Models\Blog;
use Illuminate\Database\Capsule\Manager as Capsule;

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

// $blogs = Blog::all();

$route = $_GET['route'] ?? "/";
if ($route == "/") {
    require "../index.php";
} else if ($route == "addBlog") {
    require "../addBlog.php";
} else if ($route == "contact") {
    require "../contact.php";
} else if ($route == "about") {
    require "../about.php";
} else {
    echo "No route";
}
