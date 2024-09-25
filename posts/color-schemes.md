# Color schemes

*Authored 2024-09-25*

---

Let's talk about color schemes on my website!

# The CSS

If you haven't noticed, I'm using Tailwind colors.
Yes, that Tailwind. Why? I like having a clear palette of colors, 
which is the one thing that forsaken EMCAScript library does right.

If you look at my CSS (I don't minimize it!) you will see at the start:

```css
:root {
    --dull-lavender-50: 247 244 254;
    --dull-lavender-100: 239 235 252;
    --dull-lavender-200: 227 218 250;
    --dull-lavender-300: 206 189 245;
    --dull-lavender-400: 180 151 238;
    --dull-lavender-500: 155 109 229;
    --dull-lavender-600: 140 77 218;
    --dull-lavender-700: 124 59 198;
    --dull-lavender-800: 104 49 166;
    --dull-lavender-900: 87 42 136;
    --dull-lavender-950: 54 25 92;

    --steel-gray-50: 243 243 250;
    --steel-gray-100: 233 234 246;
    --steel-gray-200: 214 214 239;
    --steel-gray-300: 189 189 228;
    --steel-gray-400: 167 162 215;
    --steel-gray-500: 148 138 202;
    --steel-gray-600: 131 114 185;
    --steel-gray-700: 113 96 162;
    --steel-gray-800: 93 80 131;
    --steel-gray-900: 77 69 106;
    --steel-gray-925: 55 49 76;
    --steel-gray-950: 34 30 46;
    --steel-gray-975: 17 15 23;
}
```

These aren't the color schemes that come with Tailwind, just the system 
that Tailwind uses for it's color schemes. And I'm not really sure where
the actual code came from (probably some SaaS site that went pay-to-win)
but I think it's a pretty decent way to pick colors for your website.


## How to use this

In your real CSS, you don't want to be using these wordy variables.
You should _abstract_ over them. Here's a great way to do that:

```css
:root {
    /* You need this here! View the MDN page for `light-dark()` if you're curious. */
    
    color-scheme: light dark;
    
    --bg: light-dark(
        rgb(var(--dull-lavender-200)), /* Light */
        rgb(var(--steel-gray-950))     /* Dark  */
    ); /* The syntax highlighter doesn't like this snippet. Sorry! */


    --text: light-dark(
        rgb(var(--steel-gray-900)),
        rgb(var(--dull-lavender-200))
    );
}
```

This lets you pick your light and dark colors together! 
Much better than a media query. 
Here's some good design tips if you're doing that: [CSS Tricks 🔗](https://css-tricks.com/a-complete-guide-to-dark-mode-on-the-web/#design)

### Make sure...

- Make sure you use the `rgb()` representation, not the hex (or use hsl). 
  And leave out the `rgb()`! This lets you add transparency like this:

```css
.whatever {
    color: rgb(var(--steel-gray-50) / 50%);
}
```

It's a little weird to look at, but it's better than having to make `--steel-gray-50-transparent`.

## The tool to do this for you

There's [hundreds of tools out there](https://letmegooglethat.com/?q=tailwind+color+palette+generator) to make configs for you ([here's my favorite](https://www.tailwindshades.com)). 
It doesn't really matter which one you pick, as long as it outputs hex codes.

Here's some glue to convert between Tailwind configs to CSS 
(just in case you don't have some weird Emacs macro to do this for you):

<style>
.inputs {
    background-color: var(--plain-bg);
    border: 1px solid var(--border);
    color: var(--text);
    padding: 0.2em;
    border-radius: 0.2em;
    font-family: Cascadia Code, monospace;
}

.inputs-surface0 {
    background-color: var(--bg-surface0);
    border: 1px solid var(--border);
    color: var(--text);
    padding: 0.2em;
    border-radius: 0.2em;
    font-family: Cascadia Code, monospace;
}

</style>
<label> Color name: <input class="inputs" id="color_name" placeholder="purple"></label> <br><br>
<label>
Your Tailwind Config: <br>
<textarea class="inputs" id="tailwind" rows="13" cols="40" placeholder="50: '#E5D9F2',
100: '#DACAED',
200: '#C5ABE2',
300: '#B08DD8',
400: '#9B6FCE',
500: '#7E45BF',
600: '#633498',
700: '#48266E',
800: '#2C1744',
900: '#11091B',
950: '#040206'
"></textarea>
</label>

<select id="color-format" class="inputs-surface0">
    <option value="rgb">r g b</option>
    <option value="hsl">h s l</option>
</select>

Please make sure you format it like the example above. You can leave whitespace or quotes or whatever.


<script>
    function cssConvert() {
        let palette = document.querySelector("textarea#tailwind").value ||
`50: '#E5D9F2',
100: '#DACAED',
200: '#C5ABE2',
300: '#B08DD8',
400: '#9B6FCE',
500: '#7E45BF',
600: '#633498',
700: '#48266E',
800: '#2C1744',
900: '#11091B',
950: '#040206'`;

        let palette_name = (document.querySelector("input#color_name").value || "purple").replaceAll(" ", "-");
        let color_format = document.querySelector("select#color-format").value || "rgb";

        let shades = {};

        try {
            palette.trim().split("\n").forEach((i) => {
                let text = i.split(":");
                let shade_number = text[0].trim().replaceAll("\"", "").replaceAll("'", "");
                let color_unparsed = text[1].trim().replaceAll(",", "").replaceAll("\"", "").replaceAll("'", "");

                if (color_format === "rgb") {
                    shades[shade_number] = hex2rgb(color_unparsed);
                } else if (color_format === "hsl") {
                    shades[shade_number] = hex2hsl(color_unparsed);
                }
            });
        } catch (error) {
            console.error(error);
            alert(error);
        }

        let str = "";
        str += ":root {\n";

        for (const [key, value] of Object.entries(shades)) {
            str += `    --${palette_name}-${key}: ${value}\n`;
        }
        
        str += "}";

        document.querySelector("textarea#tailwind").value = str;
    }

    function hex2rgb(hex) {
        let pattern_color = "^#([A-Fa-f0-9]{6})$";
        if (hex.match(pattern_color)) {
            let hex_color = hex.replace("#", "")
                , r = parseInt(hex_color.substring(0, 2), 16)
                , g = parseInt(hex_color.substring(2, 4), 16)
                , b = parseInt(hex_color.substring(4, 6), 16);
            return `${r} ${g} ${b}`;
        }
        else {
            throw new Error('Error Color Format');
        }
    }

    function hex2hsl(hex) {
      const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

      if (!result) {
        throw new Error("Could not parse Hex Color");
      }

      const rHex = parseInt(result[1], 16);
      const gHex = parseInt(result[2], 16);
      const bHex = parseInt(result[3], 16);

      const r = rHex / 255;
      const g = gHex / 255;
      const b = bHex / 255;

      const max = Math.max(r, g, b);
      const min = Math.min(r, g, b);

      let h = (max + min) / 2;
      let s = h;
      let l = h;

      if (max === min) {
        return { h: 0, s: 0, l };
      }

      const d = max - min;
      s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
      switch (max) {
        case r:
          h = (g - b) / d + (g < b ? 6 : 0);
          break;
        case g:
          h = (b - r) / d + 2;
          break;
        case b:
          h = (r - g) / d + 4;
          break;
      }
      h /= 6;

      s = s * 100;
      s = Math.round(s);
      l = l * 100;
      l = Math.round(l);
      h = Math.round(360 * h);

      return `${h} ${s} ${l}`;
    }
</script>

<button type="button" onclick="cssConvert()" class="inputs-surface0">Convert this to CSS!</button>
<span style="font-size: 0.8em">This button will work on the placeholder, if you wanna play around.</span>

> Hex to HSL Source:
> 
> <https://www.jameslmilner.com/posts/converting-rgb-hex-hsl-colors/>
> 
> Hex to RGB Source:
> 
> <https://codepen.io/othmanDes/pen/VWRLrP>
> 
> I hacked this together just for you, dear reader :3

