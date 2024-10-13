<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'posts/post-list.php';

global $router;

function fragment(string $name): void
{
    require_once __DIR__ . '/routes/fragments/' . $name . '.php';
}

$router = new AltoRouter();

/**
 * This can be useful if you're using PHP's built-in web server, to serve files like images or css
 * @link https://secure.php.net/manual/en/features.commandline.webserver.php
 */
if (file_exists($_SERVER['SCRIPT_FILENAME']) && pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_EXTENSION) !== 'php') {
    return;
}

try {
    $router->map('GET', '/', 'routes/home.php', "index");
    $router->map('GET', '/blog', 'routes/blog-index.php', "blog-index");
    $router->map('GET', '/blog/[*:post_slug]', 'routes/blog-post.php', "blog-post");
    $router->map('GET', '/contact', 'routes/contact.php', "contact");
    $router->map('GET', '/projects', 'routes/projects.php', "projects");
    $router->map('GET', '/friends', 'routes/88x31-wall.php', "friends");
    $router->map('GET', '/feed[.xml]?', 'routes/feed.php', "feed");
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
