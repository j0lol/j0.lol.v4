<?php

use Aschmelyun\BasicFeeds\Feed;
use Michelf\MarkdownExtra;
require_once "remote/atom.gen.php"; # https://starbeamrainbowlabs.com/code/phpatomgenerator/
global $posts, $posts_updated;
$host = "https://j0.lol";

/// Thx php docs
function get_include_contents($filename)
{
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

$feed = new atomfeed();

$feed->title = "j0's blog";
$feed->id_uri = $host . "/blog";
$feed->feed_uri = $host . "/feed";

$feed->logo_uri = $host . "/static/j0site-pfp.png";
$feed->addauthor("Jo Null", "me@j0.lol", "https://j0.lol/", "author");

foreach ($posts as $slug => $post) {
    $parser = new MarkdownExtra();
    $content = $parser->transform(
        file_get_contents("./posts/" . $slug . ".md")
    );

    $feed->addentry(
        $host . "/blog/" . $slug,
        $post["title"],
        $post["date"]->getTimestamp(),
        "Jo Null",
        $content
    );
}

//set the content-type
header("content-type: application/atom+xml");

//render and output the generated feed
echo $feed->render();

// $feed = Feed::create([
//     "link" => $host . "/blog",
//     "authors" => "Jo Null",
//     "title" => 'j0\'s blog',
//     "feed" => $host . "/feed.xml",
//     "description" => "A series of posts by j0",
//     "updated" => $posts_updated->format(DATE_ATOM),
// ]);

// foreach ($posts as $slug => $post) {
//     $parser = new MarkdownExtra();
//     $content = $parser->transform(
//         file_get_contents("./posts/" . $slug . ".md")
//     );

//     $feed->entry([
//         "title" => $post["title"],
//         "published" => $post["date"]->format(DATE_ATOM),
//         "link" => $host . "/blog/" . $slug,
//         "summary" => $post["subtitle"] ?? "A post by j0",
//         "content" => $content,
//     ]);
// }

// echo $feed->asAtom();
