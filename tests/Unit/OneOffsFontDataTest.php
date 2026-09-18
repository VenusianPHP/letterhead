<?php

use Letterhead\OneOffs\Org01Font;
use Letterhead\OneOffs\PicoPixelFont;
use Letterhead\OneOffs\Tiny3x3A2PtFont;
use Letterhead\OneOffs\TomThumbFont;
use Surface\Contracts\Fonts\Glyph;

test('each one-off carries bytes and covers its declared range; TomThumb keeps its 204-entry table', function () {
    foreach (['Org01Font' => Org01Font::class, 'PicoPixelFont' => PicoPixelFont::class, 'TomThumbFont' => TomThumbFont::class, 'Tiny3x3A2PtFont' => Tiny3x3A2PtFont::class] as $name => $class) {
        $face = new $class;
        $glyphs = (new ReflectionProperty($face, 'glyphs'))->getValue($face);
        $range = $face->last() - $face->first() + 1;

        expect($face->hasBitmapData())->toBeTrue("{$name} missing bitmap data")
            ->and(count($glyphs))->toBe($name === 'TomThumbFont' ? 204 : $range);
    }
});

test("Org01Font's 'A' matches Adafruit Org_01.h", function () {
    expect((new Org01Font)->glyph(0x41))->toEqual(new Glyph(87, 5, 5, 6, 0, -4));
});

test('one-off line heights match the Adafruit GFXfont structs', function () {
    expect((new Org01Font)->lineHeight())->toBe(7)
        ->and((new PicoPixelFont)->lineHeight())->toBe(7)
        ->and((new TomThumbFont)->lineHeight())->toBe(6)
        ->and((new Tiny3x3A2PtFont)->lineHeight())->toBe(4);
});
