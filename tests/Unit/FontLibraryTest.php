<?php

use Surface\Contracts\Fonts\GFXFont;

/**
 * Every face shipped by this package, discovered from the src tree so a face
 * that fails to autoload fails loudly.
 *
 * @return array<string, class-string<GFXFont>>
 */
function letterheadFaces(): array
{
    $src = dirname(__DIR__, 2).'/src';
    $classes = [];
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src, FilesystemIterator::SKIP_DOTS)) as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }
        $relative = substr($file->getPathname(), strlen($src) + 1, -strlen('.php'));
        if (! str_contains($relative, '/')) {
            continue; // the provider
        }
        $classes[$relative] = 'Letterhead\\'.str_replace('/', '\\', $relative);
    }
    ksort($classes);

    return $classes;
}

test('57 faces made the trip — the whole 0.7 library minus the empty Unifont16', function () {
    expect(letterheadFaces())->toHaveCount(57)->and(array_keys(letterheadFaces()))->not->toContain('U8g2/Unifont16');
});

test('every face autoloads, extends GFXFont, carries bytes and a sane range', function () {
    foreach (letterheadFaces() as $relative => $class) {
        expect(class_exists($class))->toBeTrue("{$class} does not autoload from {$relative}.php");
        $face = new $class;
        expect($face)->toBeInstanceOf(GFXFont::class)
            ->and($face->hasBitmapData())->toBeTrue("{$class} has no bitmap data")
            ->and($face->first())->toBeLessThanOrEqual($face->last())
            ->and($face->lineHeight())->toBeGreaterThan(0);
    }
});

test('every glyph offset stays inside the bitmap table, except the two pinned upstream quirks', function () {
    $quirks = ['Letterhead\\FreeMono\\FreeMono9Pt' => [0x7D, 0x7E]];
    foreach (letterheadFaces() as $class) {
        $face = new $class;
        $bytes = count((new ReflectionProperty($face, 'bitmaps'))->getValue($face));
        for ($code = $face->first(); $code <= $face->last(); $code++) {
            $glyph = $face->glyph($code);
            expect($glyph)->not->toBeNull("{$class} has no glyph for code {$code}");
            if (in_array($code, $quirks[$class] ?? [], true) || $glyph->width * $glyph->height === 0) {
                continue;
            }
            expect($glyph->bitmap_offset)->toBeLessThan($bytes, "{$class} glyph {$code} points past the table");
        }
    }
});

test('faces are registered in config with the 0.7 slugs and the three defaults enabled', function () {
    $faces = (require dirname(__DIR__, 2).'/config/letterhead.php')['faces'];
    $enabled = array_keys(array_filter($faces, fn (array $e) => $e['enabled']));

    expect($faces)->toHaveCount(57)
        ->and($enabled)->toBe(['free-sans-9pt', 'helvb-12', 'logisoso-16'])
        ->and(array_map(fn (array $e) => $e['class'], $faces))->each->toBeIn(array_values(letterheadFaces()));
});
