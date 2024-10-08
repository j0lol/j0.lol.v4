<nav class="bar">
    <ul>

    <?php
    global $router;

    $nav_bar = array(
        ["index", 'j0.lol'],
        ['projects', 'Projects'],
        ['blog-index', 'Blog'],
        ['contact', 'Contact'],
        ['friends', 'Friends']
    );

    foreach ($nav_bar as [$name, $label]) {
        $url = $router->generate($name);
        
        $active = $url == $_SERVER['REQUEST_URI'];
        $is_index = $name == "index";

        printf(
            '<li><a href="%s" id="nav-%s"%s>%s</a></li>',
            $url,
            $name,
            (($active)?' class="active"':''),
            $label
        );
        if ($is_index) {
            echo '<li class="mobile-show" style="flex: 1 0 100%; "></li>';
        }
    }
    unset($nav_bar)
    ?>

    </ul>
</nav>
