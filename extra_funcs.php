<?php

enum SpeechEmotion
{
    case Neutral;
    case Worried;
    case Shocked;
    case Happy;
}

enum SpeechCharacter
{
    case Deer;
    case You;

    public function img(SpeechEmotion|null $emotion): string
    {
        $deeremotion = match ($emotion) {
            SpeechEmotion::Neutral => "/static/speech/deer/neutral.png",
            SpeechEmotion::Worried => "/static/speech/deer/sad.png",
            SpeechEmotion::Happy => "/static/speech/deer/happy.png",
            SpeechEmotion::Shocked => "/static/speech/deer/shocked.png",
            null => "",
        };

        return match ($this) {
            SpeechCharacter::Deer => $deeremotion,
            SpeechCharacter::You => "/static/speech/you.png",
        };
    }

    public function alt(?SpeechEmotion $emotion): string
    {
        $deeremotion = match ($emotion) {
            SpeechEmotion::Neutral => "drawing of a deer, talking to you.",
            SpeechEmotion::Worried
                => "drawing of a sad or worried deer, talking to you.",
            SpeechEmotion::Happy => "drawing of a happy deer, talking to you.",
            SpeechEmotion::Shocked
                => "drawing of a shocked deer, talking to you.",
            null => "",
        };

        return match ($this) {
            SpeechCharacter::Deer => $deeremotion,
            SpeechCharacter::You => "drawing of you, smiling.",
        };
    }

    public function clazz()
    {
        return match ($this) {
            SpeechCharacter::Deer => "deer",
            SpeechCharacter::You => "you",
        };
    }
}
function speech_start(SpeechCharacter $char, ?SpeechEmotion $emotion)
{
    ?>
<div class="dialog-box">
    <img class="raw dialog profile" src="<?= $char->img(
        $emotion
    ) ?>" alt="<?= $char->alt($emotion) ?>">
    <div class="dialog speech <?= $char->clazz() ?>">
<?php
}

function speech_end()
{
    ?>
    </div>
</div>
<?php
}

enum CssGgIcon: string
{
    case Time = '<!-- From CSS.GG: time. Thanks for free icons! --><svg
      style="height: 1em; width: 1em; vertical-align: top;"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M9 7H11V12H16V14H9V7Z" fill="currentColor" />
      <path
        fill-rule="evenodd"
        clip-rule="evenodd"
        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z"
        fill="currentColor"
      />
    </svg>';
}

function icon_time()
{
    echo CssGgIcon::Time->value;
}
