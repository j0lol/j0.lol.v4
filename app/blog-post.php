<?php fragment("head") ?>

<body>

<div class="wrapper">

<?php fragment("navbar") ?>

<main>

<?php

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
