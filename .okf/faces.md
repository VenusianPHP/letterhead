---
type: Reference
title: The face library
description: 57 GFXFont subclasses in nine families, their encodings, and the two upstream data quirks the tests pin.
tags: [letterhead, fonts, gfxfont, inventory]
status: draft
generated: { by: claude-fable-5.1/claude-code, at: "2026-09-17T00:00:00Z" }
sources:
  - id: src
    resource: src
    title: Face classes
  - id: tests
    resource: tests/Unit
    title: Data pins
---

# Inventory

| Family | Folder | Faces | Encoding |
|---|---|---|---|
| FreeSans | `FreeSans/{,Bold,Oblique,BoldOblique}` | 9/12/18/24 pt; bold, oblique, bold-oblique at 9 and 12 | Adafruit 1bpp |
| FreeSerif | `FreeSerif/{,Bold,Italic,BoldItalic}` | same sizes; italic in place of oblique | Adafruit 1bpp |
| FreeMono | `FreeMono/{,Bold,Oblique,BoldOblique}` | same as FreeSans | Adafruit 1bpp |
| Montserrat | `Montserrat` | 12 14 16 18 20 24 | LVGL 4bpp, `$encoding = FontEncoding::LVGL`, `$bits_per_pixel = 4` |
| U8g2 | `U8g2` | Font5x8 6x10 6x12 7x13 8x13, Profont10/11/12, Spleen5x8/6x12 | Adafruit 1bpp, converted from BDF |
| HelvB | `HelvB` | 08 10 12 14 | Adafruit 1bpp |
| Unscii | `Unscii` | 8 16 | LVGL 1bpp (`LINE` offsets) |
| Logisoso | `Logisoso` | 16 | Adafruit 1bpp |
| One-offs | `OneOffs` | TomThumb, Org01, PicoPixel, Tiny3x3A2Pt | Adafruit 1bpp |

57 classes. `U8g2\Unifont16` (0.7) had no bytes and was dropped.[^src]

# Shape of a face

Properties only, Surface's `GFXFont` does the reading:
`$first`, `$last`, `$y_advance` (line height), `$bitmaps` (`list<int>`),
`$glyphs` (`[bitmap_offset, width, height, x_advance, x_offset, y_offset]`
per code from `$first`; LVGL tables carry a reserved all-zero entry 0).
Row-major faces omit `$column_major`. Byte tables are verbatim upstream.

# Pinned quirks

- `FreeMono9Pt`: 840 bytes; glyphs 0x7D and 0x7E point at 836 and 841.
  `GFXFont::byte()` answers 0 past the table, so they draw blank.[^tests]
- `TomThumb`: 204 glyph entries under a 0x20..0x7E range — Adafruit's
  extended Latin table; entries past 0x7E are unreachable.[^tests]

[^src]: Face classes
[^tests]: Data pins
