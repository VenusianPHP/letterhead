# AGENTS.md — venusian/letterhead

**Always read `.okf/index.md` first** before changing this package. When you
learn a durable package fact, update `.okf/` and append `.okf/log.md`.

## Role

Face data only. 57 `Surface\Contracts\Fonts\GFXFont` subclasses under
`Letterhead\<Family>\` plus one provider that registers the enabled ones on
Surface's `FontRegistry`. Surface owns `GFXFont`, the registry, `make:font`
and text drawing — never re-implement them here.

## Rules

* Composer `venusian/letterhead` **0.8.0**; requires `surface/contracts`,
  `surface/fonts`, `venusian-voyager/nuts-and-bolts`. Branch alias
  `dev-main → 0.8.x-dev`.
* Faces set properties only: `$first`, `$last`, `$y_advance`, `$bitmaps`,
  `$glyphs`, and where needed `$column_major`, `$bits_per_pixel`,
  `$encoding`. No methods.
* Byte tables are upstream data (GFXFonts 0.2.0 / Adafruit / LVGL / u8g2).
  Two quirks are pinned by tests and stay: `FreeMono9Pt` glyphs 0x7D/0x7E
  point past the table; `TomThumb` ships 204 glyph entries under 0x20..0x7E.
* Config: `config/letterhead.php` merged as `letterhead`; publish tag
  `letterhead-config`; defaults enabled `free-sans-9pt`, `helvb-12`,
  `logisoso-16`.
* Provider uses the container (`FontRegistry::class`), never a MagicAlias.
* Tests: Pest v4, no container. `tests/Unit/FontLibraryTest.php` expects 57.
* Strongly typed. Prefer `is_null($x)`. No class constants.
