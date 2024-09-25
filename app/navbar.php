
<nav class="bar">

    <ul>

    <?php
    global $router;

    $nav_bar = array(
        ["index", 'j0.lol'],
        ['blog-index', 'Blog'],
        ['contact', 'Contact']
    );

    foreach ($nav_bar as [$name, $label]) {

        $url = $router->generate($name);
        $active = false;
        if ($url == $_SERVER['REQUEST_URI']) {
            $active = true;
        }

        printf(
                '<li><a href="%s" id="nav-%s"%s>%s</a></li>',
            $url,
            $name,
            (($active)?' class="active"':''),
            $label

        );
    }
    unset($nav_bar)
    ?>

    </ul>
</nav>
