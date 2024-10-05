<?php global $router;
fragment("head") ?>

<body>

<div class="wrapper">

    <?php fragment("navbar") ?>

    <main>

        <h1>Post Index</h1>

        <blockquote>BTW, I'm working on RSS.</blockquote>

        <ul>
            <?php
            global $posts;

            foreach ($posts as $slug => ["title" => $title, "date" => $date]) {

                try {
                    printf("<li><a href=\"%s\">%s</a> &bullet; Posted on %s</li>",
                        $router->generate("blog-post", ['post_slug' => "$slug"]),
                        $title,
                        $date
                    );
                } catch (Exception $e) {
                    echo $e;
                }
            }
            ?>
        </ul>
    </main>

    <?php fragment("footer") ?>

</div>
</body>
