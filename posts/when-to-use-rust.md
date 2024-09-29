# When to use Rust

*and when not to!*

Posted on 2024-09-29

<hr>

I'm honestly not sure how to write this intro without sounding weirdly combative.
Rust is good at some things and bad at other things. This should be a pretty non-controversial take.


## When you're doing low-level development

If you're working low level, and you want your code to be correct, use Rust.
This one's pretty obvious. I like doing a lot of low-level game development (working on obsolete hardware, writing shaders, etc.) and Rust is great for this as it has lots of great tools and frameworks for this!

## When you're writing performant code

This is basically the same as the previous point, but Rust's "zero cost abstractions" mean that you can work at a 
higher level and write performant code. Sometimes.

## When you need something to be airtight

One great example of this is Element X, a Matrix client. 
Matrix rolls their own encryption, and while I don't claim to know much about implementing encryption, 
avoiding memory unsafety is a pretty good idea.

Matrix rolls [matrix-rust-sdk](https://github.com/matrix-org/matrix-rust-sdk) with their Android and iOS clients 
by making [bindings](https://github.com/matrix-org/matrix-rust-sdk/tree/main/bindings). This ensures that all of 
their clients work the same way when decrypting messages or whatever people on Matrix do.
It also means that their encryption logic is faster (probably).

Note that they don't write the entire app in Rust! It's not worth it!

## When you're learning Rust (or just having fun)

All of this doesn't matter when you're still learning. When you are learning, it's best to strive for the thing 
you want to do whether it's worth it. Tackling things that aren't easy will teach you way more
lessons than if you write 50 CLI calculators.

## When you really want to use *that* library

Sometimes it's worth it, just for that one library that someone made well.
What I would recommend doing in this case is to make bindings to a language that's more appropriate for your use case. 
This is a good learning exercise too!

# When not to use Rust:

## A CRUD web app
This one is very painful to me because I did this. It's really, really not worth the hassle. 
Use Laravel. It's perfectly engineered for producing shiny CRUD apps.

If you really care about how performant your site is going to be, maybe consider using Rust.

## Your personal website

I made this mistake! It was fun to make at first, and I enjoyed applying my knowledge, but it became such a burden
to maintain.

Axum puts way more overhead on your program than something simple like PHP's AltoRouter. 
You have to be a real HTTP server and deal with all that comes with being a real HTTP server.
Another thing is that Axum requires you to get all of your state via specifying them in handlers,
and then you have to worry about lifetimes and stuff. Maybe I'm nitpicking, but it's too much for a small project.

You will end up importing a lot of crates.
Rust doesn't come with a lot to help you write a blog!
I ended up with about 20 dependencies for my old blog site.



Your iteration time will slow because of inflated build times.
This one sucks if you're writing a blog!
You have to recompile it every time (unless you're smart about it!)
This gets worse the more you add to your site, punishing you for pouring more care into your website.


## A GUI app

Overplayed, but Rust GUI sucks.

If you're making a small program, you can get away with `egui` + `eframe` for a UI. It's pretty well-made for this use case.
If you're going to make a larger program, make bindings from a backend to a frontend
in a more appropriate language (Swift, Kotlin, C/++/#) or just don't use Rust.
Consider why Rust would *help* you with your program, and if that outweighs the technical debt of gluing a Rust blob to your program.

If you're insane enough (_or well funded enough_), you can get away with making your own GUI. Good luck!



# A conclusion

These are just some recommendations, from doing most of this stuff myself. 
Rust is a fun language, I enjoy it a lot, but I can get really burnt out when I end up using it wrong.

You can do anything you like, and I recommend it, but please be kind to yourself.
If you find yourself knee-deep in a Rust program and thinking "I am *really* not enjoying myself", maybe try using something else.
Keep doing things and having fun!