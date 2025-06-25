<?php fragment("head"); ?>

<body>
    <script src="/static/prism.js"></script>

<div class="wrapper">

    <?php fragment("navbar"); ?>
    <article>

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
            <hr class="frontmatter">

        <p class="blog-publish"><span aria-label="Published date:"><?php icon_time(); ?></span> <time datetime="<?= $date ?>"><?= $date->format(
    "F jS, Y"
) ?></time></p>




        <?php if (file_exists("./posts/" . $post_slug . ".html")) {
            include "./posts/" . $post_slug . ".html";
        } ?>

    </article>
    <?php if (isset($meta["post"])) { ?>
            <div style="background: var(--bg-surface1); padding: 0rem 1rem;" class="tablet-show">
                <hr class="frontmatter pilcrow">

            </div>

            <section class="page">
                <noop>

                <bsky-comments post="<?= $meta["post"] ?>"></bsky-comments>
            </section>
            <?php } ?>


    <?php fragment("footer"); ?>

</div>
</body>
<?php fragment("closer"); ?>
