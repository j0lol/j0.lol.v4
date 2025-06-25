<!doctype html>
<html lang="en-US">
<head>
    <?php global $commit_hash; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="/static/normalize.<?= $commit_hash ?>.css" type="text/css" rel="stylesheet">
    <link href="/static/style.<?= $commit_hash ?>.css" type="text/css" rel="stylesheet">
    <link href="/static/nav.<?= $commit_hash ?>.css" type="text/css" rel="stylesheet">
    <link href="/static/dialog.<?= $commit_hash ?>.css" type="text/css" rel="stylesheet">
    <meta name="theme-color" content="#b497ee">
    <meta name="apple-mobile-web-app-status-bar-style" content="#b497ee">
    <script defer data-domain="j0.lol" src="https://plausible.j0.lol/js/script.js"></script>
    <script type="module" src="/static/bsky-comments.js"></script>
    <link href="https://prismjs.catppuccin.com/mocha.css" rel="stylesheet" />

    <?php
    global $post_slug;

    if (isset($post_slug)) {

        global $posts;

        $meta = $posts[$post_slug];
        ?>
            <meta property="og:title" content="j0 — <?= $meta["title"] ?>" />
        <?php // I wish PHP had a way of doing $x = if {} else {} that wasn't ugly (ternary op)

        if (key_exists("subtitle", $meta)) {
            $description = sprintf(
                "%s — Posted on %s",
                $meta["subtitle"],
                $meta["date"]
            );
        } else {
            $description = sprintf("Posted on %s", $meta["date"]);
        } ?>
            <meta property="og:description" content="<?= $description ?>" />
        <?php
    } else {
         ?>
            <meta property="og:title" content="j0" />
        <?php
    }
    ?>

    <link rel="icon" href="/static/j0site-pfp.png"/>
    <link rel="apple-touch-icon" href="/static/j0site-pfp.png"/>
    <meta property="og:image" content="https://j0.lol/static/j0site-banner.png"/>

    <title>j0.lol</title>
</head>
