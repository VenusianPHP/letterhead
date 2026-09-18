<?php

use Letterhead\FreeMono\Bold\FreeMono12PtBold;
use Letterhead\FreeMono\Bold\FreeMono9PtBold;
use Letterhead\FreeMono\BoldOblique\FreeMono12PtBoldOblique;
use Letterhead\FreeMono\BoldOblique\FreeMono9PtBoldOblique;
use Letterhead\FreeMono\FreeMono12Pt;
use Letterhead\FreeMono\FreeMono18Pt;
use Letterhead\FreeMono\FreeMono24Pt;
use Letterhead\FreeMono\FreeMono9Pt;
use Letterhead\FreeMono\Oblique\FreeMono12PtOblique;
use Letterhead\FreeMono\Oblique\FreeMono9PtOblique;
use Letterhead\FreeSans\Bold\FreeSans12PtBold;
use Letterhead\FreeSans\Bold\FreeSans9PtBold;
use Letterhead\FreeSans\BoldOblique\FreeSans12PtBoldOblique;
use Letterhead\FreeSans\BoldOblique\FreeSans9PtBoldOblique;
use Letterhead\FreeSans\FreeSans12Pt;
use Letterhead\FreeSans\FreeSans18Pt;
use Letterhead\FreeSans\FreeSans24Pt;
use Letterhead\FreeSans\FreeSans9Pt;
use Letterhead\FreeSans\Oblique\FreeSans12PtOblique;
use Letterhead\FreeSans\Oblique\FreeSans9PtOblique;
use Letterhead\FreeSerif\Bold\FreeSerif12PtBold;
use Letterhead\FreeSerif\Bold\FreeSerif9PtBold;
use Letterhead\FreeSerif\BoldItalic\FreeSerif12PtBoldItalic;
use Letterhead\FreeSerif\BoldItalic\FreeSerif9PtBoldItalic;
use Letterhead\FreeSerif\FreeSerif12Pt;
use Letterhead\FreeSerif\FreeSerif18Pt;
use Letterhead\FreeSerif\FreeSerif24Pt;
use Letterhead\FreeSerif\FreeSerif9Pt;
use Letterhead\FreeSerif\Italic\FreeSerif12PtItalic;
use Letterhead\FreeSerif\Italic\FreeSerif9PtItalic;
use Letterhead\HelvB\HelvB08;
use Letterhead\HelvB\HelvB10;
use Letterhead\HelvB\HelvB12;
use Letterhead\HelvB\HelvB14;
use Letterhead\Logisoso\Logisoso16;
use Letterhead\Montserrat\Montserrat12;
use Letterhead\Montserrat\Montserrat14;
use Letterhead\Montserrat\Montserrat16;
use Letterhead\Montserrat\Montserrat18;
use Letterhead\Montserrat\Montserrat20;
use Letterhead\Montserrat\Montserrat24;
use Letterhead\OneOffs\Org01Font;
use Letterhead\OneOffs\PicoPixelFont;
use Letterhead\OneOffs\Tiny3x3A2PtFont;
use Letterhead\OneOffs\TomThumbFont;
use Letterhead\U8g2\Font5x8;
use Letterhead\U8g2\Font6x10;
use Letterhead\U8g2\Font6x12;
use Letterhead\U8g2\Font7x13;
use Letterhead\U8g2\Font8x13;
use Letterhead\U8g2\Profont10;
use Letterhead\U8g2\Profont11;
use Letterhead\U8g2\Profont12;
use Letterhead\U8g2\Spleen5x8;
use Letterhead\U8g2\Spleen6x12;
use Letterhead\Unscii\Unscii16;
use Letterhead\Unscii\Unscii8;

return [
    /*
    |--------------------------------------------------------------------------
    | Faces
    |--------------------------------------------------------------------------
    |
    | slug => ['class' => face, 'enabled' => bool]. Enabled entries are
    | registered on Surface's font registry at boot; reach them with
    | Fonts::face('helvb-12'). Publish with --tag=letterhead-config to change
    | the set.
    |
    */
    'faces' => [
        'free-sans-9pt' => ['class' => FreeSans9Pt::class, 'enabled' => true],
        'free-sans-12pt' => ['class' => FreeSans12Pt::class, 'enabled' => false],
        'free-sans-18pt' => ['class' => FreeSans18Pt::class, 'enabled' => false],
        'free-sans-24pt' => ['class' => FreeSans24Pt::class, 'enabled' => false],
        'free-sans-9pt-bold' => ['class' => FreeSans9PtBold::class, 'enabled' => false],
        'free-sans-12pt-bold' => ['class' => FreeSans12PtBold::class, 'enabled' => false],
        'free-sans-9pt-oblique' => ['class' => FreeSans9PtOblique::class, 'enabled' => false],
        'free-sans-12pt-oblique' => ['class' => FreeSans12PtOblique::class, 'enabled' => false],
        'free-sans-9pt-bold-oblique' => ['class' => FreeSans9PtBoldOblique::class, 'enabled' => false],
        'free-sans-12pt-bold-oblique' => ['class' => FreeSans12PtBoldOblique::class, 'enabled' => false],
        'free-mono-9pt' => ['class' => FreeMono9Pt::class, 'enabled' => false],
        'free-mono-12pt' => ['class' => FreeMono12Pt::class, 'enabled' => false],
        'free-mono-18pt' => ['class' => FreeMono18Pt::class, 'enabled' => false],
        'free-mono-24pt' => ['class' => FreeMono24Pt::class, 'enabled' => false],
        'free-mono-9pt-bold' => ['class' => FreeMono9PtBold::class, 'enabled' => false],
        'free-mono-12pt-bold' => ['class' => FreeMono12PtBold::class, 'enabled' => false],
        'free-mono-9pt-oblique' => ['class' => FreeMono9PtOblique::class, 'enabled' => false],
        'free-mono-12pt-oblique' => ['class' => FreeMono12PtOblique::class, 'enabled' => false],
        'free-mono-9pt-bold-oblique' => ['class' => FreeMono9PtBoldOblique::class, 'enabled' => false],
        'free-mono-12pt-bold-oblique' => ['class' => FreeMono12PtBoldOblique::class, 'enabled' => false],
        'free-serif-9pt' => ['class' => FreeSerif9Pt::class, 'enabled' => false],
        'free-serif-12pt' => ['class' => FreeSerif12Pt::class, 'enabled' => false],
        'free-serif-18pt' => ['class' => FreeSerif18Pt::class, 'enabled' => false],
        'free-serif-24pt' => ['class' => FreeSerif24Pt::class, 'enabled' => false],
        'free-serif-9pt-bold' => ['class' => FreeSerif9PtBold::class, 'enabled' => false],
        'free-serif-12pt-bold' => ['class' => FreeSerif12PtBold::class, 'enabled' => false],
        'free-serif-9pt-italic' => ['class' => FreeSerif9PtItalic::class, 'enabled' => false],
        'free-serif-12pt-italic' => ['class' => FreeSerif12PtItalic::class, 'enabled' => false],
        'free-serif-9pt-bold-italic' => ['class' => FreeSerif9PtBoldItalic::class, 'enabled' => false],
        'free-serif-12pt-bold-italic' => ['class' => FreeSerif12PtBoldItalic::class, 'enabled' => false],
        'montserrat-12' => ['class' => Montserrat12::class, 'enabled' => false],
        'montserrat-14' => ['class' => Montserrat14::class, 'enabled' => false],
        'montserrat-16' => ['class' => Montserrat16::class, 'enabled' => false],
        'montserrat-18' => ['class' => Montserrat18::class, 'enabled' => false],
        'montserrat-20' => ['class' => Montserrat20::class, 'enabled' => false],
        'montserrat-24' => ['class' => Montserrat24::class, 'enabled' => false],
        'unscii-8' => ['class' => Unscii8::class, 'enabled' => false],
        'unscii-16' => ['class' => Unscii16::class, 'enabled' => false],
        'org-01' => ['class' => Org01Font::class, 'enabled' => false],
        'pico-pixel' => ['class' => PicoPixelFont::class, 'enabled' => false],
        'tiny-3x3-a2pt' => ['class' => Tiny3x3A2PtFont::class, 'enabled' => false],
        'tom-thumb' => ['class' => TomThumbFont::class, 'enabled' => false],
        'u8g2-5x8' => ['class' => Font5x8::class, 'enabled' => false],
        'u8g2-6x10' => ['class' => Font6x10::class, 'enabled' => false],
        'u8g2-6x12' => ['class' => Font6x12::class, 'enabled' => false],
        'u8g2-7x13' => ['class' => Font7x13::class, 'enabled' => false],
        'u8g2-8x13' => ['class' => Font8x13::class, 'enabled' => false],
        'u8g2-profont-10' => ['class' => Profont10::class, 'enabled' => false],
        'u8g2-profont-11' => ['class' => Profont11::class, 'enabled' => false],
        'u8g2-profont-12' => ['class' => Profont12::class, 'enabled' => false],
        'u8g2-spleen-5x8' => ['class' => Spleen5x8::class, 'enabled' => false],
        'u8g2-spleen-6x12' => ['class' => Spleen6x12::class, 'enabled' => false],
        'helvb-08' => ['class' => HelvB08::class, 'enabled' => false],
        'helvb-10' => ['class' => HelvB10::class, 'enabled' => false],
        'helvb-12' => ['class' => HelvB12::class, 'enabled' => true],
        'helvb-14' => ['class' => HelvB14::class, 'enabled' => false],
        'logisoso-16' => ['class' => Logisoso16::class, 'enabled' => true],
    ],
];
