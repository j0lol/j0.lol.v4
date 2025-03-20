<?php global $router;
fragment("head");
?>


<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <?php fragment("navbar"); ?>

    <main>
        <h1>88x31 Button Wall</h1>

        <p>These silly buttons used to be everywhere, but now they are just a fun relic of the past. It's a cute way to
            link sites together!</p>

        <p>My button should be in the footer! Feel free to add to your site (and link back to my site!)</p>


        <script src="/static/prism.js"></script>

        <pre><code class="language-html">&#x3C;a rel=&#x22;noreferrer&#x22; href=&#x22;https://j0.lol&#x22;&#x3E;
    &#x3C;img src=&#x22;https://j0.lol/static/badges/j0.gif&#x22; alt=&#x22;Logo: j0, with subtitle &#x27;deer thing&#x27;. To the side, there is a purple deer with yellow features. Various elements flicker.&#x22;&#x3E;
&#x3C;/a&#x3E;</code></pre>

        <br><br>


        <h2>Friends</h2>

        <p>These are the buttons that my friends made to link to their websites. Click them to go to them!</p>
        <div class="_88x31s">
            <?php
            $buttons = [
                "meihapps.gif" => [
                    "Logo: mei happs. Monospaced text. Pink border.",
                    "https://meihapps.gay",
                ],
                "finn.gif" => [
                    "Logo: cr0wbar. Handwritten text. The 0 has what appears to be a shiny gem inside of it.",
                    "https://cr0wbar.dev",
                ],
                "cadence_now.png" => [
                    "Logo: cadence Now!. The first part of the text is in an 'outrun' vaporwave-type style. The final part is handwritten. There is what appears to be a purple eye with a yellow iris to the left of the text. Enclosing the eye is a white letter c. There is a star banner on the bottom right.",
                    "https://cadence.moe",
                ],
                "barrow.png" => [
                    "Green text says 'Join Barr0wnet'. Enclosing the text is a scientific diagram of the chemical alpha-methyl.",
                    "http://alphamethyl.barr0w.net",
                ],
                "swiftys.gif" => [
                    "Swifty's HQ!",
                    "https://swiftyshq.neocities.org",
                ],
            ];

            foreach ($buttons as $file => [$alt, $link]) {
                printf(
                    '<a href="%s"><img class="raw" src="/static/badges/%s" alt="%s"> </a>',
                    $link,
                    $file,
                    $alt
                );
            }
            ?>
        </div>

        <p>Note: I run (self-hosted) analytics on my site! If you put me on your website, someone will inevitably click it without referrer blocking, meaning that I will know! And I will probably add you here if you do that!</p>

    </main>
    <?php fragment("footer"); ?>
</div>
<?php fragment("closer") ?>
