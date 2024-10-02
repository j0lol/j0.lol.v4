<?php global $router;
fragment("head") ?>


<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <?php fragment("navbar") ?>

    <main>
        <p>Hi! I'm Jo <em>(often stylised <code>j0</code>)</em>. Welcome to my website! </p>


        <?php
        $pronouns = ["she/her", "they/them", "it/its"];
        shuffle($pronouns);

        $genders = [
            "the number Zero",
            "deer",
            "don't worry about it",
            "between girl and void",
            "in stores this Summer",
            "behind you",
            "featuring Funky Kong",
            "stolen",
            "n't",
            $_SERVER['REMOTE_ADDR']
        ];
        shuffle($genders);

        function makeSelect($list, $funky = false)
        {
            echo "<select>";
            foreach ($list as $item) {
                $punctuation = $funky ? [".", "!"][array_rand([0, 1])] : "";

                echo "<option>" . $item . $punctuation . "</option>";
            }
            echo "</select>";
        }

        ?>

        <h1>About me</h1>
        <p>I'm a creature!
            <label id="my-pronouns">My pronouns are <?php makeSelect($pronouns); ?></label>
            and
            <label>my gender is <?php makeSelect($genders, true); ?></label>

        </p>

        <details>
            <summary>What about you?</summary>

            <label id="pronouns-blurb"> What's your pronouns? <input id="pronouns-choice"> </label>
            <button id="pronouns-submit" type="button" onclick="steal_pronouns()">Submit</button>

            <script>
                function steal_pronouns() {
                    let input_field = document.querySelector("#pronouns-choice");
                    let pronouns = input_field.value;
                    input_field.value = "";

                    document.querySelector("#pronouns-blurb").innerHTML = "haha! mine now!";

                    document.querySelector("#my-pronouns").innerHTML = `My pronouns are <b>${pronouns}</b>`;

                    document.querySelector("#pronouns-submit").remove();

                }
            </script>
        </details>

        <h2>What are you doing?</h2>
        <p>Here's what im interested in right now!</p>
        <?php
        $interests = [
            "Rust",
            "PHP",
            "WebGPU",
            "Small websites",
            "Shader programming"
        ];
        echo "<ul>";
        foreach ($interests as $interest) {
            echo "<li>" . $interest . "</li>";
        }
        echo "</ul>"
        ?>

        <p style="margin-bottom: 0.25em">
            Here's what I'm doing online:
        </p>
        <div>
            <blockquote style="border-radius: 0.2em; margin: 0 0.25em; padding: 0.25em;">
                A voxel-based game for WebGPU! This one's going to take a while.
            </blockquote>
        </div>

        <p style="margin-bottom: 0.25em">
            And here's what I'm doing offline:
        </p>
        <div>
            <blockquote style="border-radius: 0.2em; margin: 0 0.25em; padding: 0.25em;">
                Trying to get back into using my exercise bike 🚴🚴
            </blockquote>
        </div>


        <h2>More info</h2>
        <ul>
            <li>
                If you want to see what I've done before, see <a href="<?php echo $router->generate("projects") ?>">my
                    projects</a>!
            </li>

            <li>
                If you want to see how I did my projects, see <a href="<?php echo $router->generate("blog-index") ?>">my
                    blog</a>!
            </li>
        </ul>

        <p>
            i'm always working on something! if you're curious, <a href="<?php echo $router->generate("contact") ?>">contact
                me</a>, or check out my <a href="https://github.com/j0lol">git repos</a>!
        </p>

    </main>
    <?php fragment("footer") ?>
</div>
