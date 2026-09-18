---
type: Core
title: Config and registration
description: config/letterhead.php slugs, the three defaults, the publish tag, and how the provider registers faces on Surface's registry.
tags: [letterhead, config, provider, registry]
status: draft
generated: { by: claude-fable-5.1/claude-code, at: "2026-09-17T00:00:00Z" }
sources:
  - id: config
    resource: config/letterhead.php
    title: Slug map
  - id: provider
    resource: src/LetterheadServiceProvider.php
    title: Provider
---

# Shape

`config/letterhead.php` → `['faces' => [slug => ['class' => FQCN, 'enabled' => bool]]]`.
Merged as `letterhead`; publish tag `letterhead-config`.[^config]

Slugs are the 0.7 autopen slugs: `free-sans-9pt`, `free-mono-12pt-bold`,
`free-serif-9pt-italic`, `montserrat-16`, `u8g2-profont-12`,
`u8g2-spleen-6x12`, `helvb-12`, `unscii-8`, `logisoso-16`, `tom-thumb`,
`org-01`, `pico-pixel`, `tiny-3x3-a2pt` … 57 in all.

Enabled by default: `free-sans-9pt`, `helvb-12`, `logisoso-16`.

# Registration

`LetterheadServiceProvider::boot()` resolves `FontRegistry::class` from the
container and calls `extend($slug, $class)` for each enabled entry. Disabled
entries cost nothing — the class is never loaded. Reach a face with
`Fonts::face('helvb-12')`.[^provider]

[^config]: Slug map
[^provider]: Provider
