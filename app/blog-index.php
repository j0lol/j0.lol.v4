<?php global $router;
route("head") ?>

<body>

<div class="wrapper">

<?php route("navbar") ?>

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
foreach (array_diff(scandir("./posts"), array('..', '.')) as $post_file) {

   $post_file = pathinfo($post_file, PATHINFO_FILENAME);

   printf("<li><a href=\"%s\">%s</a> &bullet; Posted on %s</li>",
       $router->generate("blog-post", ['post_slug' => "$post_file"]),
       $posts[$post_file][0],
       $posts[$post_file][1]
   );
}
?>
</ul>
</main>

<?php route("footer") ?>

</div>
</body>
