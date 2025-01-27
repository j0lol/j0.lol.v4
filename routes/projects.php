<?php global $router;
fragment("head") ?>

<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <?php fragment("navbar") ?>

    <main>
        <h1>Projects</h1>

        <p> these are the projects i have made over the years. i hope you enjoy them! <br>(🚧 means Work in Progress)
        </p>

        <div class="card-stack">

            <?php

            # [ Title, Description, URL, Year, Image slug, Playable URL ]
            $cards = array(
                ["Sokobubble", "Block-pushing (via bubbles) game for Global Game Jam 2025", 'https://github.com/j0lol/ggj25', '2025', 'sokobubble.jpg', null],
                ["mel0n", "sphere-stacker game for the GBA. Rust & agb-rs.", 'https://github.com/j0lol/mel0n', '2024 🚧', 'mel0n.jpg', null],
                ["Dig", "Side-view 2D Platformer with Building. Rust & Macroquad. Click to play! (Keyboard + Mouse)", 'https://github.com/j0lol/dig-v2', '2024 🚧', 'dig.jpg', 'https://vps.j0.lol/dig/'],
                ["ZeroBridge", "Discord bridge for Minecraft 1.4.7. NilLoader mod.", 'https://github.com/j0lol/ZeroBridge', '2024', "zerobridge.jpg", null],
                ["World Conquest", "Group project: Risk clone made in Godot. I was project lead.", 'https://github.com/goblin-code-se/world_conquest', '2024', "conquest.jpg", 'https://vps.j0.lol/conquest'],
                ["TIC-80 Tetris", "Physics-accurate Tetris clone for the TIC-80 Fantasy console. Click to play! (Keyboard only)", null, '2023', "tetr.jpg",'https://vps.j0.lol/tetr/'],
                ["launCCher", "ToonTown: Corporate Clash launcher for Linux. Rust & egui.", 'https://codeberg.org/j0/launccher', '2023', "launccher.jpg", null],
                ["Modulus", "Modular tool mod for Minecraft. Kotlin, Quilt mod.", 'https://github.com/j0lol/modulus', '2022-2024 🚧', "modulus.png", null],
                ["Quicksnad", "Simple Fabric Minecraft mod that lets you grow cacti & sugarcane quicker. Java.", 'https://modrinth.com/mod/quicksnad', '2022', "snad.png", null],
                ["TransVoiceParty", "List of trans voice training resources.", 'https://transvoice.party', '2019-now', "tvp.jpg", null],
            );

            foreach ($cards as [$name, $description, $url, $year, $imslug, $play]) {
                ?>
                    <div class="card">
                        <div class="preview">
                            <img class="raw" src="<?= "/static/card_images/" . $imslug ?>" alt="Screenshot of project.">
                        </div>
                        <div class="blurb">
                            <span class="title"><?= $name ?>
                                <span class="year"><?= $year ?></span>
                            </span>
                            <span class="description"><?= $description ?></span>
                        </div>
                        <div class="links">
                            <?php if ($play != null) {
                                ?> <a href="<?= $play ?>">Play!</a> <?php
                            }?>
                            <?php if ($url != null) {
                                ?> <a href="<?= $url ?>">Source</a> <?php
                            }?>
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>
    </main>
    <?php fragment("footer") ?>
</div>

