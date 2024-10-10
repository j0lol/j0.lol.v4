<?php global $router;
fragment("head");
?>

<body>

<div class="wrapper">

    <?php fragment("navbar"); ?>

    <main>

        <h1>Post Index</h1>

        <p><a href="/feed">Click here for an RSS feed.</a></p>

        <ul>
            <?php
            global $posts;

            foreach ($posts as $slug => $item) {
                try {
                    printf(
                        "<li><a href=\"%s\">%s</a> &bullet; Posted on %s</li>",
                        $router->generate("blog-post", [
                            "post_slug" => "$slug",
                        ]),
                        $item["title"],
                        $item["date"]->format("l jS \of F, Y")
                    );
                } catch (Exception $e) {
                    echo $e;
                }
            }
            ?>
        </ul>
    </main>

    <?php fragment("footer"); ?>

</div>
</body>
