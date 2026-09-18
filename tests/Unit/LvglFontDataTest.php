<?php

use Letterhead\Montserrat\Montserrat12;
use Letterhead\Unscii\Unscii8;
use Surface\Contracts\Fonts\FontEncoding;
use Surface\Contracts\Fonts\Glyph;
use Surface\Contracts\Fonts\YOffsetMode;

test('Montserrat12 resolves as an LVGL 4bpp anti-aliased face', function () {
    $face = new Montserrat12;

    expect($face->encoding())->toBe(FontEncoding::LVGL)
        ->and($face->bitsPerPixel())->toBe(4)
        ->and($face->yOffsetMode())->toBe(YOffsetMode::RAW)
        ->and($face->first())->toBe(0x20)
        ->and($face->last())->toBe(0x7E)
        ->and($face->lineHeight())->toBe(15);
});

test('Montserrat12 keeps the reserved all-zero glyph at index 0', function () {
    $glyphs = (new ReflectionProperty(new Montserrat12, 'glyphs'))->getValue(new Montserrat12);

    expect($glyphs[0])->toBe([0, 0, 0, 0, 0, 0])->and(count($glyphs))->toBeGreaterThanOrEqual(0x7E - 0x20 + 2);
});

test("Montserrat12 maps 'A' through the LVGL +1 shift", function () {
    expect((new Montserrat12)->glyph(0x41))->toEqual(new Glyph(848, 10, 9, 9, -1, 0));
});

test('Montserrat12 4bpp glyph data has the packed shape', function () {
    $face = new Montserrat12;
    $bytes = count((new ReflectionProperty($face, 'bitmaps'))->getValue($face));
    for ($code = $face->first(); $code <= $face->last(); $code++) {
        $glyph = $face->glyph($code);
        expect($glyph)->not->toBeNull()
            ->and($glyph->bitmap_offset + intdiv($glyph->width * $glyph->height + 1, 2))->toBeLessThanOrEqual($bytes, "glyph {$code} overruns the table");
    }
});

test('Unscii8 resolves as an LVGL 1bpp face measured from the line bottom', function () {
    $face = new Unscii8;

    expect($face->encoding())->toBe(FontEncoding::LVGL)
        ->and($face->bitsPerPixel())->toBe(1)
        ->and($face->yOffsetMode())->toBe(YOffsetMode::LINE)
        ->and($face->lineHeight())->toBe(9)
        ->and($face->glyph(0x41))->toEqual(new Glyph(154, 6, 7, 8, 1, 1));
});
