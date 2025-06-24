<?php fragment("head"); ?>

<body>
    <script src="/static/prism.js"></script>

<div class="wrapper">

    <?php fragment("navbar"); ?>
    <main>

        <?php
        use Aeon\Calendar\Gregorian\DateTime;

        global $posts, $post_slug;

        $meta = $posts[$post_slug];
        $date = $meta["date"];
        ?>
        <h1 class="blog-head"><?= $meta["title"] ?></h1>
        <?= key_exists("subtitle", $meta)
            ? "<span class='blog-subhead'><em>" .
                $meta["subtitle"] .
                "</em></span>"
            : "" ?>
            <hr>

        <p class="blog-publish">Posted on <time datetime="<?= $date ?>"><?= $date->format(
    "F jS, Y"
) ?></time></p>




        <?php if (file_exists("./posts/" . $post_slug . ".html")) {
            $contents = file_get_contents("./posts/" . $post_slug . ".html");
            echo $contents;
        } ?>

    </main>
    <?php if (isset($meta["post"])) { ?>
            <section class="page">
                <bsky-comments post="<?= $meta["post"] ?>"></bsky-comments>
            </section>
            <?php } ?>


    <?php fragment("footer"); ?>

</div>
</body>
<?php fragment("closer"); ?>
