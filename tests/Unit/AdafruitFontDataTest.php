<?php

use Letterhead\FreeMono\FreeMono9Pt;
use Surface\Contracts\Fonts\FontEncoding;
use Surface\Contracts\Fonts\Glyph;
use Surface\Contracts\Fonts\YOffsetMode;

test('FreeMono9Pt resolves as an Adafruit 1bpp face', function () {
    $face = new FreeMono9Pt;

    expect($face->encoding())->toBe(FontEncoding::ADAFRUIT)
        ->and($face->bitsPerPixel())->toBe(1)
        ->and($face->yOffsetMode())->toBe(YOffsetMode::RAW)
        ->and($face->first())->toBe(0x20)
        ->and($face->last())->toBe(0x7E)
        ->and($face->lineHeight())->toBe(14)
        ->and($face->capHeight())->toBe(13);
});

test('FreeMono9Pt carries one glyph per code in its range', function () {
    $face = new FreeMono9Pt;

    expect(count((new ReflectionProperty($face, 'glyphs'))->getValue($face)))->toBe(0x7E - 0x20 + 1);
});

test("the glyph for 'A' survived the port byte for byte", function () {
    expect((new FreeMono9Pt)->glyph(0x41))->toEqual(new Glyph(237, 11, 10, 11, 0, -9));
});

test('glyph bitmaps stay within the packed table up to the pinned quirk', function () {
    $face = new FreeMono9Pt;
    $bytes = count((new ReflectionProperty($face, 'bitmaps'))->getValue($face));
    for ($code = $face->first(); $code <= 0x7C; $code++) {
        $glyph = $face->glyph($code);
        expect($glyph->bitmap_offset + intdiv($glyph->width * $glyph->height + 7, 8))->toBeLessThanOrEqual($bytes, "glyph {$code} overruns the table");
    }
});

test('the upstream FreeMono9Pt truncation quirk is preserved verbatim', function () {
    $face = new FreeMono9Pt;

    expect(count((new ReflectionProperty($face, 'bitmaps'))->getValue($face)))->toBe(840)
        ->and($face->glyph(0x7D)->bitmap_offset)->toBe(836)
        ->and($face->glyph(0x7E)->bitmap_offset)->toBe(841)
        ->and($face->byte(841))->toBe(0);
});

test('an out-of-range code answers null', function () {
    expect((new FreeMono9Pt)->glyph(0x1F))->toBeNull();
});
