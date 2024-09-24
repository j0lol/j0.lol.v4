<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="/static/normalize.css" type="text/css" rel="stylesheet">
    <link href="/cachebusting/style-{{CSS_AFFIX}}.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <link rel="stylesheet" href="/static/font-awesome-extension.css">
    <meta name="theme-color" content="#b497ee">
    <meta name="apple-mobile-web-app-status-bar-style" content="#b497ee">
    {% block head %}{% endblock %}
    <title>j0.lol</title>
</head>
<body>
<script src="/static/oneko.js/oneko.js"></script>
<div class="wrapper">
    <nav class="bar">
        {% set nav_bar = [
        ('/', 'index', 'j0.lol'),
        ('/posts', 'posts', 'Blog'),
        ('/contact', 'contact', 'Contact')
        ]%}
        <ul>
            {% for href, id, str in nav_bar %}
            <li><a href="{{href}}" id="nav-{{id}}" {%if id == active_page %}class="active"{% endif%}>{{str}}</a></li>
            {% endfor %}
        </ul>
    </nav>
    <main>
        {% block content %}Placeholder text{% endblock %}
    </main>
    <footer>
        <div class="_88x31s">
            <span class="sr-only">Friend's pages:</span>
            <a rel="noreferrer" href="https://meihapps.gay"><img src="/static/badges/meihapps.gif" alt="mei happs"></a>
            <a rel="noreferrer" href="https://maia.crimew.gay"><img src="/static/badges/maia.crimew.gay.png" alt="maia crimew"></a>
            <a rel="noreferrer" href="https://nano.lgbt"><img src="/static/badges/nano.png" alt="nano"></a>
        </div>
        <div class="_88x31s">
            <span class="sr-only">Miscellaneous links:</span>
            <a rel="noreferrer" href="https://www.stardewvalley.net"><img src="/static/badges/stardew_valley.gif" alt="Get Stardew Valley!"></a>
            <a rel="noreferrer" href="https://tokio.rs"><img src="/static/badges/tokio.png" alt="Powered by Tokio"></a>
            <a rel="noreferrer" href="https://fly.io"><img src="/static/badges/flyio.png" alt="Hosted by Fly.io"></a>
        </div>
    </footer>
</div>
</body>
</html>