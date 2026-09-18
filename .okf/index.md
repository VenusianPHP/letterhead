---
okf_version: "0.2"
---

# venusian/letterhead — knowledge bundle

Bitmap faces for Venusian Surface: 57 `GFXFont` subclasses in nine families
and one provider. The 0.8 successor of `scrapyard-io/autopen` 0.7. Read this
index first, then only the concept the task needs. Every concept is
`status: draft` until a human verifies it.

# Concepts

* [faces.md](/faces.md) - the inventory by family, encodings, the two pinned
  upstream quirks, how a face is shaped
* [config.md](/config.md) - slugs, the three defaults, the publish tag, how
  the provider registers faces

# Related bundles

* venusian/surface `.okf/fonts.md` - `GFXFont`, the registry, `Typesetter`,
  atlas and spans, `make:font`

# Fast facts

| | |
|---|---|
| Version | 0.8.0, PHP `^8.4\|^8.5\|^8.6` |
| Namespace | `Letterhead\` at `src/` |
| Depends on | `surface/contracts`, `surface/fonts`, `venusian-voyager/nuts-and-bolts` |
| Provider | `Letterhead\LetterheadServiceProvider` (discovered via `extra.venusian.providers`) |
| Faces | 57; `U8g2\Unifont16` from 0.7 was empty and was not carried |
