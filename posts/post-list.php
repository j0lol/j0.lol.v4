<?php

use Carbon\Carbon;

global $posts;

function dt($string)
{
    return new Carbon($string . " UTC");
}

$posts = [
    "productivity" => [
        "title" => "Free yourself from the shackles of productivity",
        "date" => dt("2025-03-21 12:00")
    ],
    "downtime" => [
        "title" => "My site went down!",
        "subtitle" => "...so I made it simpler",
        "date" => dt("2025-03-20 22:00")
    ],
    "rss-is-done" => [
        "title" => "RSS is done!",
        "date" => dt("2024-10-10 20:00")
    ],
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
