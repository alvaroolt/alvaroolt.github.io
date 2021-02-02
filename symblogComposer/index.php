<?php
// include "datos/datos.php";
require_once "vendor/autoload.php";

use App\Models\Blog;
// use Illuminate\Database\Capsule\Manager as Capsule;

// $capsule = new Capsule;
// $capsule->addConnection([
//     'driver'    => 'mysql',
//     'host'      => 'localhost',
//     'database'  => 'symblog',
//     'username'  => 'symblog',
//     'password'  => 'symblog',
//     'charset'   => 'utf8',
//     'collation' => 'utf8_unicode_ci',
//     'prefix'    => '',
// ]);
// // Make this Capsule instance available globally via static methods... (optional)
// $capsule->setAsGlobal();

// // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
// $capsule->bootEloquent();

$blogs = Blog::all();

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="../css/screen.css" type="text/css" rel="stylesheet" />
    <link href="../css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
            <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="symblogComposer/">Home</a></li>
                        <li><a href="index.php?route=about">About</a></li>
                        <li><a href="index.php?route=contact">Contact</a></li>
                        <li><a href="symblogComposer/blogs/add">Add blog</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index.php">symblog</a></h2>
                <h3><a href="index.php">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
            <?php
            $contador = 0;
            foreach ($blogs as $blog) {
                $contador++;
                echo "<article class=\"blog\">
                        <div class=\"date\">'
                            <time datetime=\" \">" . date_format($blog["created_at"], 'Y-m-d H:i:s') . "</time>
                        </div>
                        <header>
                            <h2><a href=\"show.php?id=$contador\">" . $blog["title"] . "</a></h2>
                        </header>'
                        <img src=\"../img/" . $blog["imagen"] . "\" />
                        <div class=\"snippet\">
                            <p>" . $blog["blog"] . "</p>'
                            <p class=\"continue\"><a href=\"#\">Continue reading...</a></p>
                        </div>'
                        <footer class=\"meta\">'
                            <p>Comments: <a href=\"#\">Numero</a></p>
                            <p>Posted by <span class=\"highlight\">" . $blog["author"] . "</span> at " . date_format($blog["created_at"], 'H:i:s') . "</p>
                            <p>Tags: <span class=\"highlight\">" . $blog["tags"] . "</span></p>
                        </footer>
                    </article>";
            }
            ?>
        </section>
        <aside class="sidebar">
            <section class="section">
                <header>
                    <h3>Tag Cloud</h3>
                </header>
                <p class="tags">
                    <li><a href="index.html?route=index">Home</a></li>
                    <li><a href="index.html?route=about">About</a></li>
                    <li><a href="index.html?route=contact">Contact</a></li>
                    <li><a href="index.html?route=addBlog">Add blog</a></li>
                </p>
            </section>
            <section class="section">
                <header>
                    <h3>Latest Comments</h3>
                </header>
                <article class="comment">
                    <header>
                        <p class="small"><span class="highlight">Carlos Aguilera</span> commented on
                            <a href="#">A day with Symfony2</a>
                        </p>
                    </header>
                    <p>Comentario Usuario</p>
                </article>
            </section>
        </aside>
        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>
</body>

</html>