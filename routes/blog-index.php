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
                    ?>
                        <li>
                            <a href="<?= $router->generate("blog-post", ["post_slug" => "$slug",]) ?>"><?=$item["title"]?></a>
                            <br>
                            <span style="font-family: var(--font-mono)">-></span> <?= $item["date"]->format("l jS \of F, Y") ?>
                        </li>
                    <?php
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
<?php fragment("closer") ?>
