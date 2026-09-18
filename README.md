# venusian/letterhead

Bitmap faces for Venusian Surface. 57 `GFXFont` classes in nine families,
registered on Surface's font registry at boot. Pair with `venusian/surface`
0.8.

```bash
composer require venusian/letterhead
php computer vendor:publish --tag=letterhead-config   # optional: enable more faces
```

```php
$hud = Fonts::face('helvb-12');
$g->text('READY', 0.0, 0.0, Color::hex('#fff'), $hud);
```

Enabled by default: `free-sans-9pt`, `helvb-12`, `logisoso-16`. The other 54
ship `enabled => false` in `config/letterhead.php`.

| Family | Faces | Encoding |
|---|---|---|
| FreeSans / FreeSerif / FreeMono | 9, 12, 18, 24 pt + bold / oblique (italic) at 9 and 12 | Adafruit 1bpp |
| Montserrat | 12, 14, 16, 18, 20, 24 | LVGL 4bpp anti-aliased |
| U8g2 | 5x8, 6x10, 6x12, 7x13, 8x13, Profont 10/11/12, Spleen 5x8, 6x12 | Adafruit 1bpp (converted from BDF) |
| HelvB | 08, 10, 12, 14 | Adafruit 1bpp |
| Unscii | 8, 16 | LVGL 1bpp |
| Logisoso | 16 | Adafruit 1bpp |
| One-offs | TomThumb, Org01, PicoPixel, Tiny3x3A2Pt | Adafruit 1bpp |

Faces are data. `GFXFont`, the registry and text drawing live in Surface.

MIT.
