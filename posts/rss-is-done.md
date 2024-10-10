Just a short post!

I added RSS (technically an Atom feed) to my website!
You can now subscribe to my blog posts with the link on my [blog index](/blog)
or click [here](/feed) to add me to your RSS reader.

## Implementation

I used this very colorful library from "Starbeam Rainbow Labs": [atom.gen.php](https://starbeamrainbowlabs.com/code/phpatomgenerator/).
It's quite easy to use, and less buggy than others that I found.

I had to pull in [Carbon](https://github.com/briannesbitt/Carbon) (great library) to deal with dates better too
(I was storing them in a quite silly way before.)

Pretty simple, don't you think?
```php
<?php

use Michelf\MarkdownExtra;
require_once "remote/atom.gen.php"; # https://starbeamrainbowlabs.com/code/phpatomgenerator/
global $posts;
$host = "https://j0.lol"; // So this doesn't break when im working on localhost

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

header("content-type: application/atom+xml");
echo $feed->render();
```
