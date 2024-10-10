<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="/static/normalize.css" type="text/css" rel="stylesheet">
    <link href="/static/style.css?v=<?php echo md5_file(
        "static/style.css"
    ); ?>" type="text/css" rel="stylesheet">
    <meta name="theme-color" content="#b497ee">
    <meta name="apple-mobile-web-app-status-bar-style" content="#b497ee">
    <script defer data-domain="j0.lol" src="https://plausible.j0.lol/js/script.js"></script>

    <?php
    global $post_slug;

    if (isset($post_slug)) {
        global $posts;

        $meta = $posts[$post_slug];

        printf(
            <<<END
    <meta property="og:title" content="j0 — %s" />
END
            ,
            $meta["title"]
        );

        // I wish PHP had a way of doing $x = if {} else {} that wasn't ugly (ternary op)
        if (key_exists("subtitle", $meta)) {
            $description = sprintf(
                "%s — Posted on %s",
                $meta["subtitle"],
                $meta["date"]
            );
        } else {
            $description = sprintf("Posted on %s", $meta["date"]);
        }

        printf(
            <<<END
    <meta property="og:description" content="%s" />
END
            ,
            $description
        );
    } else {
        echo <<<END
    <meta property="og:title" content="j0" />
END;
    }
    ?>

    <meta rel="icon" content="https://j0.lol/static/j0site-pfp.png"/>
    <meta rel="apple-touch-icon" content="https://j0.lol/static/j0site-pfp.png"/>
    <meta property="og:image" content="https://j0.lol/static/j0site-banner.png"/>

    <style>
        @media screen and (prefers-color-scheme: dark) {
        <?php echo syntect_css("./Catppuccin Mocha.tmTheme"); ?>
        }

        @media screen and (prefers-color-scheme: light) {
        <?php echo syntect_css("./Catppuccin Latte.tmTheme"); ?>
        }
    </style>
    <title>j0.lol</title>
</head>
