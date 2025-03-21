<?php fragment("head"); ?>

<body>

<div class="wrapper">

    <?php fragment("navbar"); ?>
    <main>
        <script src="/static/prism.js"></script>

        <?php
        use Aeon\Calendar\Gregorian\DateTime;

        global $posts, $post_slug;

        $meta = $posts[$post_slug];
        $date = $meta["date"];

        ?>
        <h1><?= $meta["title"] ?></h1>
        <?= key_exists("subtitle", $meta)
            ? "<p><em>" . $meta["subtitle"] . "</em></p>"
            : "" ?>
        <p>Posted on <time datetime="<?= $date ?>"><?= $date->format("F jS, Y") ?></time></p>



        <hr>

        <?php
        if (file_exists("./posts/" . $post_slug . ".html")) {
            $contents = file_get_contents("./posts/" . $post_slug . ".html");
            echo $contents;
        }
        ?>

    </main>

    <?php fragment("footer"); ?>

</div>
</body>
<?php fragment("closer"); ?>
