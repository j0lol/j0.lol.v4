<nav class="bar">
    <ul>

    <?php
    global $router;

    $nav_bar = [
        ["index", "j0.lol"],
        ["projects", "Projects"],
        ["blog-index", "Blog"],
        ["contact", "Contact"],
    ];

    foreach ($nav_bar as [$name, $label]) {

        $url = $router->generate($name);

        $active = $url == $_SERVER["REQUEST_URI"];
        $is_index = $name == "index";
        ?>
        <li>
            <a href="<?= $url ?>" id="nav-<?= $name ?>"<?php if (
    $active
) { ?> class="active" <?php } ?> ><?= $label ?></a>
        </li>
        <?php if ($is_index) { ?>
                <li class="navbreak-show" style="flex: 1 0 100%; "></li>
        <?php }
    }
    unset($nav_bar);
    ?>

    </ul>
</nav>
