<?php fragment("head") ?>

<body>

<div class="wrapper">

<?php fragment("navbar") ?>

<main>

<?php

global $posts;

$meta = $posts[$post_slug];

printf('<h1>%s</h1>',$meta["title"]);

if (key_exists("subtitle", $meta)) {
    printf('<p><em>%s</em></p>',$meta["subtitle"]);
}
printf('<p>Posted on %s</p>',$meta["date"]);

echo "<hr>";

use Michelf\MarkdownExtra;

$post_file = "./posts/" . $post_slug . ".md";

$contents = file_get_contents($post_file);

if (!$contents) {
    echo "404.";
} else {

    $parser = new MarkdownExtra();
    $parser->code_block_content_func = function ($code, $language) {
        return syntect_highlight($code, $language);
    };

    echo $parser->transform($contents);
}
?>

</main>

<?php fragment("footer") ?>

</div>
</body>
