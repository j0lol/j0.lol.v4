<?php global $router;
fragment("head") ?>

<body>

<div class="wrapper">

<?php fragment("navbar") ?>

<main>

<h1>Post Index</h1>

<?php

use Michelf\MarkdownExtra;

$parser = new MarkdownExtra();
$parser->code_block_content_func = function ($code, $language) {
    return syntect_highlight($code, $language);
};

$posts = array(
    "color-schemes" => ["Color Schemes", "2024-09-25"],
    "php-site" => ["Site remake", "2024-09-25"],
    "zerobridge-launch" => ["ZeroBridge 0.1.0 Release", "2024-04-03"]
);
?>

<ul>
<?php
foreach ($posts as $slug => [$title, $date]) {

   printf("<li><a href=\"%s\">%s</a> &bullet; Posted on %s</li>",
       $router->generate("blog-post", ['post_slug' => "$slug"]),
       $title,
       $date
   );
}
?>
</ul>
</main>

<?php fragment("footer") ?>

</div>
</body>
