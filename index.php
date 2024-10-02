<?php

require_once 'vendor/autoload.php';
require_once 'posts/post-list.php';

function route($name)
{
    require_once __DIR__ . '/app/' . $name . '.php';
}

function fragment($name)
{
    require_once __DIR__ . '/app/fragments/' . $name . '.php';
}

global $router;

$router = new AltoRouter();

/**
 * This can be useful if you're using PHP's built-in web server, to serve files like images or css
 * @link https://secure.php.net/manual/en/features.commandline.webserver.php
 */
if (file_exists($_SERVER['SCRIPT_FILENAME']) && pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_EXTENSION) !== 'php') {
    return;
}

try {
    $router->map('GET', '/', 'app/home.php', "index");
    $router->map('GET', '/blog', 'app/blog-index.php', "blog-index");
    $router->map('GET', '/blog/[*:post_slug]', 'app/blog-post.php', "blog-post");
    $router->map('GET', '/contact', 'app/contact.php', "contact");
    $router->map('GET', '/projects', 'app/projects.php', "projects");
    $router->map('GET', '/friends', 'app/88x31-wall.php', "friends");
} catch (Exception $e) {
    echo $e;
}

// Match the current request
$match = $router->match(urldecode($_SERVER['REQUEST_URI']));
if ($match) {
    foreach ($match['params'] as &$param) {
        ${key($match['params'])} = $param;
    }
    require_once $match['target'];
} else {
    http_response_code(404);
    exit('Page not found');
}
