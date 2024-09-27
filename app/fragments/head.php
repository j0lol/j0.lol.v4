<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="/static/normalize.css" type="text/css" rel="stylesheet">
    <link href="/static/style.css#<?php echo md5_file("static/style.css") ?>" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <link rel="stylesheet" href="/static/font-awesome-extension.css">
    <meta name="theme-color" content="#b497ee">
    <meta name="apple-mobile-web-app-status-bar-style" content="#b497ee">
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
