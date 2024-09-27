# Site remake

*Authored on 2024-09-25*
<hr>

I remade my website! I went from using Rust to PHP!


# Why? Don't you love Rust?

I love Rust! I don't love using the wrong tool for the job though! I think that PHP is the perfect language for a **P**ersonal **H**ome **P**age.

- It's interpreted, so I don't have to recompile the thing every time I want to change something
- PHP is quick and easy, and comes with great templating built in.
  - In Rust, I had to import `minijinja` to do this

## Rust web development is dependency hell!

Dependencies in Rust suck. They add to your compile time, mess up your `Cargo.toml`, and if they have macros they're even worse for compile time!

Look at all the dependencies I used to make this site!

```toml
[dependencies]
ansi-to-html = "0.2.1"
axum = "0.7.4"
chrono = "0.4.35"
comrak = "0.21.0"
erased-serde = "0.4.4"
include_dir = "0.7.3"
itertools = "0.12.1"
kdl = "4.6.0"
knuffel = "3.2.0"
miette = { version = "7.2.0", features = ["fancy"] }
minijinja = { version = "1.0.16", features = ["loader"] }
rand = "0.8.5"
select = "0.6.0"
serde = { version = "1.0.197", features = ["derive"] }
syntect = "5.2.0"
thiserror = "1.0.58"
tokio = { version = "1", features = ["full"] }
tower-http = { version = "0.5.2", features = ["fs"] }
tracing-subscriber = "0.3.18"
```

How many dependencies do I have in PHP?

```json
{
    "require": {
        "altorouter/altorouter": "^2.0",
        "michelf/php-markdown": "^2.0"
    }
}

```

Two! I could probably get it even lower if I were to use my web server's routing, but ehhhhhhhhhh

Altorouter is a pretty nice to use router, and PHP Markdown renders my blog's posts.

# Okay, but how do you do syntax highlighting?

PHP-Markdown doesn't come with it! We need to shoehorn it in ourselves.

After looking around, I found `Shiki-PHP`, which offers code highlighting by making bindings to `Shiki`: <https://github.com/spatie/shiki-php>

However, `Shiki` is slow. Very slow. It uses *Node JS*. As we both know, running JavaScript on the server is the worst thing you can do for your poor program.

## A solution

I used `Syntect` before to do highlighting in Rust. It's very good! Just one issue: It's in Rust!

### Let's use Rust in PHP! 

Using [ext-php-rs](https://github.com/davidcole1340/ext-php-rs), all I need to do is to make a stub program to hook `Syntect` in, then install it as a PHP Module.

I need two functions:

- One, to turn code into HTML
- Another, to generate CSS for the highlighting

```rust
#[php_function]
pub fn syntect_highlight(code: &str, language_ext: &str) -> String {
    let syntax_set = SyntaxSet::load_defaults_newlines();
    let syntax = syntax_set.find_syntax_by_extension(language_ext).unwrap();
    let mut html_generator = ClassedHTMLGenerator::new_with_class_style(syntax, &syntax_set, ClassStyle::Spaced);
    for line in LinesWithEndings::from(code) {
        html_generator.parse_html_for_line_which_includes_newline(line).unwrap();
    }
    let output_html= html_generator.finalize();
    output_html
}

#[php_function]
pub fn syntect_css(theme_path: &str) -> String {
    let theme = ThemeSet::get_theme(PathBuf::from(theme_path)).unwrap();
    css_for_theme_with_class_style(&theme, ClassStyle::Spaced).unwrap()
}
```

Now, we can just build this with `cargo build`, and uh. Get a `.dylib`.

Our glue library `ext-php-rs` offers a solution to install this all for us, but it doesn't work on my machine! And it seems abandoned!
Instead, let's just install it ourselves.

> **Note**
> 
> I got this working on my Ubuntu Server! Not my MacOS laptop though. I had to build it from git instead of the latest version though.
> 
> `cargo install cargo-php --git https://github.com/davidcole1340/ext-php-rs`
> 
> If you have PHP installed globally you will have to install it on the super-user (use sudo).
> Overall this seems spotty, and I'm looking for an alternative to this.

From **`cargo-php`**
```rs
fn get_ext_dir() -> AResult<PathBuf> {
    let cmd = Command::new("php")
        .arg("-r")
        .arg("echo ini_get('extension_dir');")
        .output()
        .context("Failed to call PHP")?;
```

Okay, so...

```shell
$ php -r "echo ini_get('extension_dir');"

/opt/homebrew/lib/php/pecl/20230831

$ # Please ignore how i blatantly misspelled syntect here. Shame on me.
$ cp ./target/release/libsyntext_ext_php.dylib /opt/homebrew/lib/php/pecl/20230831
```

Okay, now we need to enable it in `php.ini`.

```shell
$ nvim /opt/homebrew/etc/php/8.3/php.ini



extension=libsyntext_ext_php.dylib

[ Normal ]    /opt/homebrew/etc/php/8.3/php.ini    976:1
:x
```

Now we can use it in PHP. Awesome! The code blocks on this site are being rendered like this :) 

Note that this technically adds a third dependency, if you were keeping track. Better than 19!!

Also: if you want to use it, here's the repo: <https://github.com/j0lol/ext-php-syntect>