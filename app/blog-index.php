<?php global $router;
fragment("head") ?>

<body>

<div class="wrapper">

    <?php fragment("navbar") ?>

    <main>

        <h1>Post Index</h1>

        <blockquote>BTW, I'm working on RSS.</blockquote>

        <?php

        use Michelf\MarkdownExtra;

        $parser = new MarkdownExtra();
        $parser->code_block_content_func = function ($code, $language) {
            return syntect_highlight($code, $language);
        };
        ?>

        <ul>
            <?php

            global $posts;

            foreach ($posts as $slug => ["title" => $title,
                     "date" => $date]) {

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
