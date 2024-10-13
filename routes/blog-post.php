<?php fragment("head") ?>

<body>

<div class="wrapper">

    <?php fragment("navbar") ?>
    <main>

        <?php
        use Aeon\Calendar\Gregorian\DateTime;
        
        global $posts, $post_slug;

        $meta = $posts[$post_slug];
        $date = $meta["date"];

        printf(
        <<<END
        <h1>%s</h1>
        %s
        <p>Posted on %s</p>
        END,
            $meta["title"],
            (key_exists("subtitle", $meta))
                ? '<p><em>' .  $meta["subtitle"] . '</em></p>'
                : "",
            $date->format("l jS \of F, Y"));
        ?>

        <hr>

        <?php
        use Michelf\MarkdownExtra;

        $contents = file_get_contents("./posts/" . $post_slug . ".md");

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
