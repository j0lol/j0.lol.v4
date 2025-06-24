<?php global $router;
fragment("head");
?>
<div class="wrapper">
    <?php fragment("navbar"); ?>

    <main>
        <?php
        $pronouns = ["she/her", "they/them", "it/its"];
        shuffle($pronouns);

        $genders = [
            "the number Zero",
            "deer",
            "idk",
            "between girl and void",
            "in stores this Summer",
            "behind you",
            "stolen",
            "n't",
            $_SERVER["REMOTE_ADDR"],
        ];
        shuffle($genders);

        function makeSelect(array $list, bool $funky = false)
        {
            echo "<select>";
            foreach ($list as $item) {
                $punctuation = "";

                if ($funky) {
                    $punctuation = [".", "!"][rand(0, 1)];
                }

                echo "<option>" . $item . $punctuation . "</option>";
            }
            echo "</select>";
        }
        ?>

        <h1 class="fancy page-head">Hi!</h1>

        <p>I'm Jo.
            <label id="my-pronouns">My pronouns are <?php makeSelect(
                $pronouns
            ); ?></label>
            and
            <label>my gender is <?php makeSelect($genders, true); ?></label>
        </p>

        <details style="margin-top: -0.7rem;">
            <summary>What's your pronouns? </summary>

            <label id="pronouns-blurb"> <input id="pronouns-choice"> </label>
            <button id="pronouns-submit" type="button" onclick="steal_pronouns()">Submit</button>

            <script>
                function steal_pronouns() {
                    let input_field = document.querySelector("#pronouns-choice");
                    let pronouns = input_field.value;
                    input_field.value = "";

                    document.querySelector("#pronouns-blurb").innerHTML = "haha! mine now!";
                    document.querySelector("#my-pronouns").innerHTML = "My pronouns are <b>" + pronouns + "</b>";
                    document.querySelector("#pronouns-submit").remove();
                }
            </script>
        </details>

        <p>I'm a CompSci graduate from the University of Sussex. <a href="/contact">Hire me!</a></p>

        <h2>What do you do?</h2>
        <p>I mainly write software, and study in the art of writing software. My specialities lie in writing correct, robust code. I love to read and write documentation, and to double-check my work. Outside of development, I like to draw and write, and cook meals with a good splash of umami. I am conversational in a constructed language, toki pona. </p>
        <p>Here's what I'm interested in right now!</p>
        <ul style="margin-top: -0.5rem;">
        <?php
        $interests = [
            "Rust <small>(self explanatory)</small>",
            "Making small stuff with PHP",
            "WebGPU for fast, write-once-run-anywhere rendering",
            "Small websites, small communities",
            "Idiomatic vanilla Javascript, modern CSS",
            "Clean design",
        ];
        foreach ($interests as $interest) {
            echo "<li>" . $interest . "</li>";
        }
        ?>
        </ul>

        <p style="margin-bottom: 0.25em">
            Here's what I'm doing on the computer:
        </p>
        <div>
            <blockquote class="small">Slowly hacking away on <a href="https://github.com/j0lol/vee">Vee Face Library</a>, a pure Rust Mii renderer and parser.</blockquote>
        </div>

        <p style="margin-bottom: 0.25em">
            And here's what I'm doing offline:
        </p>
        <div>
            <blockquote class="small"">Not much! I'm still kind of recovering from burnout.</blockquote>
        </div>

        <h2>More info</h2>
        <ul>
            <li>
                If you want to see what I've done before, see <a href="<?php echo $router->generate(
                    "projects"
                ); ?>">my
                    projects</a>!
            </li>

            <li>
                If you want to see how I did my projects, see <a href="<?php echo $router->generate(
                    "blog-index"
                ); ?>">my
                    blog</a>!
            </li>
        </ul>

        <p>
            I'm always working on something! If you're curious,
            <a href="<?= $router->generate(
                "contact"
            ) ?>">contact me</a>, or check out my <a href="https://github.com/j0lol">git repos</a>!
        </p>

        <div style="display: flex; flex-direction: row">
            <img class="raw dialog profile" src="/static/speechdeer.png" alt="drawing of a deer, talking to you.">
            <div class="dialog speech jo">
                <p>
                    Thanks for visiting my website =]
                </p>
            </div>
        </div>

    </main>
    <?php fragment("footer"); ?>
</div>
<?php fragment("closer"); ?>
