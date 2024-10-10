<?php

use Carbon\Carbon;

global $posts, $posts_updated;

function dt($string)
{
    return new Carbon($string . " UTC");
}

// Make sure to update this when you add a new date, silly!
$posts_updated = dt("2024-04-29");

$posts = [
    "when-to-use-rust" => [
        "title" => "When to use Rust",
        "subtitle" => "and when not to!",
        "date" => dt("2024-09-29"),
    ],
    "color-schemes" => [
        "title" => "Color Schemes",
        "date" => dt("2024-09-25"),
    ],
    "php-site" => [
        "title" => "Site remake",
        "date" => dt("2024-09-25"),
    ],
    "zerobridge-launch" => [
        "title" => "ZeroBridge 0.1.0 Release",
        "date" => dt("2024-04-03"),
    ],
];
