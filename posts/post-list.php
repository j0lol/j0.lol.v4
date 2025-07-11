<?php

use Carbon\Carbon;

global $posts;

function dt($string)
{
    return new Carbon($string . " UTC");
}

$posts = [
    "suspicious-88x31" => [
        "title" => "The suspicious 88&times;31",
        "date" => dt("2025-06-27 16:00"),
        "trash" => true,
    ],
    "love-your-website" => [
        "title" => "On loving your website",
        "subtitle" => "It's your website. Give it some love!",
        "date" => dt("2025-06-27 15:00"),
        "post" => "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lslrn3ci6c22"
    ],
    "swift-inline-array" => [
        "title" => "Is Swift becoming unergonomic Rust?",
        "subtitle" => "(No, but I thought it was)",
        "date" => dt("2025-06-25 15:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lsh3wg4zqc2t",
    ],
    "spotlight-raycast" => [
        "title" => "How I use the new Spotlight",
        "date" => dt("2025-06-25 00:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lsfjq2xg6c2o",
    ],
    "tahoe-beta" => [
        "title" =>
            "The macOS Tahoe beta is so bad that it made me switch to Chromium.",
        "subtitle" => "Urrghhh",
        "date" => dt("2025-06-24 22:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lsfg6ec7ws2h",
    ],
    "comments" => [
        "title" => "I added Bluesky powered comments!",
        "date" => dt("2025-03-26 20:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3llclmbjrak2z",
    ],
    "kegworks-winery" => [
        "title" => "How to run games on macOS like it's SteamOS",
        "subtitle" => "Or: How to use CrossOver without using CrossOver",
        "date" => dt("2025-03-22 19:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lkygg5mxic2q",
    ],
    "draw-something" => [
        "title" => "draw something",
        "date" => dt("2025-03-21 22:00"),
        "trash" => true,
    ],
    "productivity" => [
        "title" => "Free yourself from the shackles of productivity",
        "date" => dt("2025-03-21 12:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lkvc6c4lzk23",
    ],
    "downtime" => [
        "title" => "My site went down!",
        "subtitle" => "...so I made it simpler",
        "date" => dt("2025-03-20 22:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3lktpo75k5c2c",
    ],
    "rss-is-done" => [
        "title" => "RSS is done!",
        "date" => dt("2024-10-10 20:00"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3l66ms6urns2j",
    ],
    "when-to-use-rust" => [
        "title" => "When to use Rust",
        "subtitle" => "and when not to!",
        "date" => dt("2024-09-29"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3l5cv4ubgak2j",
    ],
    "color-schemes" => [
        "title" => "Color Schemes",
        "date" => dt("2024-09-25"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3l4yymeuqvs2j",
    ],
    "php-site" => [
        "title" => "Site remake",
        "date" => dt("2024-09-25"),
        "post" =>
            "at://did:plc:by6abidhbnj6siox5if2wzq6/app.bsky.feed.post/3l4ymvfx6hs2j",
    ],
    "zerobridge-launch" => [
        "title" => "ZeroBridge 0.1.0 Release",
        "date" => dt("2024-04-03"),
    ],
];
