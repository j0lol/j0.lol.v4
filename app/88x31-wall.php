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

        <style>
            .fakepre {
                display: block;
                padding: 1rem;
                background-color: var(--plain-bg);
                border: 1px solid var(--border);
                border-radius: 0.5rem;
                font-family: "Cascadia Code", sans-serif;
                font-feature-settings: "zero";
                font-weight: 300;
                white-space: preserve-breaks;
                word-wrap: anywhere;
            }
        </style>

        <pre class="fakepre">
            <?php
            $string = <<<END
<a rel="noreferrer" href="https://j0.lol">
    <img src="https://j0.lol/static/badges/j0.gif" alt="Image contains a purple deer with bright neon yellow eyes, glasses and nose. The neon yellow is flickering. Next to the deer it says in large text: 'j0', and under that it says 'deer thing'. The 'thing' and the slash in the zero both are neon yellow and flicker.">
</a>
END;

            echo htmlspecialchars($string);
            ?>
        </pre>

        <br><br>


        <h2>Friends</h2>

        <p>These are the buttons that my friends made to link to their websites. Click them to go to them!</p>
        <div class="_88x31s">
            <?php
            $buttons = [
                "meihapps.gif" => [
                    "Box with purple border and dark indigo background. Text says 'mei happs' in monospaced font.",
                    "https://meihapps.gay",
                ],
                "finn.gif" => [
                    "Green striped background. Handwritten, pixelated text says 'cr0wbar'. The 0 has what appears to be a shiny gem inside of it.",
                    "https://cr0wbar.dev",
                ],
                "cadence_now.png" => [
                    "Purple background. Text says cadence Now!. The first part of the text is in an 'outrun' vaporwave-type style. The final part is handwritten. There is what appears to be a purple eye with a yellow iris to the left of the text. Enclosing the eye is a white letter c. There is a star banner on the bottom right.",
                    "https://cadence.moe",
                ],
                "barrow.png" => [
                    "Green text says 'Join Barr0wnet'. Enclosing the text is a scientific diagram of the chemical alpha-methyl.",
                    "http://alphamethyl.barr0w.net",
                ],
            ];

            foreach ($buttons as $file => [$alt, $link]) {
                printf(
                    '<a rel="noreferrer" href="%s"><img class="raw" src="/static/badges/%s" alt="%s"> </a>',
                    $link,
                    $file,
                    $alt
                );
            }
            ?>

        </div>

    </main>
    <?php fragment("footer"); ?>
</div>
