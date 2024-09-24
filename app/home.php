<?php global $router;
route("head") ?>


<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <?php route("navbar") ?>

    <main>
        <h1 class="sr-only">About me</h1>
        <p> hi! welcome to my website! i'm a creature who is very project-focused & creative :)</p>

        <h1>Dev Projects</h1>
        <p> these are the projects i have made over the years. i hope you enjoy them! <br>(🚧 means Work in Progress) </p>

        <div class="card-stack">

            <?php

            # [ Title, Description, URL, Year, Image slug ]

            $cards = array(
                ["mel0n", "🚧 sphere-stacker game for the GBA. Rust & agb-rs", 'https://github.com/j0lol/mel0n', '2024', 'mel0n.jpg'],
                ["Dig", "🚧 Side-view 2D Platformer with Building. Rust & Macroquad. Click to play! (Keyboard + Mouse)", 'https://vps.j0.lol/dig/', '2024', 'dig.jpg'],
                ["ZeroBridge", "Discord bridge for Minecraft 1.4.7. NilLoader mod.", 'https://github.com/j0lol/ZeroBridge', '2024', "zerobridge.jpg"],
                ["World Conquest", "Group project: Risk clone made in Godot. I was project lead.", 'https://github.com/goblin-code-se/world_conquest', '2024', "conquest.jpg"],
                ["TIC-80 Tetris", "Physics-accurate Tetris clone for the TIC-80 Fantasy console. Click to play! (Keyboard only)", 'https://j0.lol/static/sillytetrisgame/index.html', '2023', "tetr.jpg"],
                ["launCCher", "ToonTown: Corporate Clash launcher for Linux. Rust & egui", 'https://codeberg.org/j0/launccher', '2023', "launccher.jpg"],
                ["Modulus", "🚧 Modular tool mod for Minecraft. Quilt mod.", 'https://github.com/j0lol/modulus', '2022-2024', "modulus.png"],
                ["Quicksnad", "Simple Fabric Minecraft mod that lets you grow cacti & sugarcane quicker", 'https://modrinth.com/mod/quicksnad', '2022', "snad.png"],
                ["TransVoiceParty", "List of trans voice training resources", 'https://transvoice.party', '2019-now', "tvp.jpg"],
            );

            foreach ($cards as [$name, $description, $url, $year, $imslug]) {

                printf('<a href="%s" style="text-decoration: none">
                    <div class="card">
                        <div class="preview">
                            <img class="raw" src="%s">
                        </div>
                        <span class="title">%s
                            <span class="year">%s</span>
                        </span>
                        <span class="description">%s</span>
                    </div>
                </a>
                ',
                $url,
                "/static/card_images/" . $imslug,
                $name,
                $year,
                $description
                );

            }


            ?>
        </div>


        <p>
            i'm always working on something! if you're curious, <a href="<?php echo $router->generate("contact") ?>">contact me</a>, or check out my <a href="https://github.com/j0lol">git repos</a>!
        </p>

    </main>
    <?php route("footer") ?>
</div>