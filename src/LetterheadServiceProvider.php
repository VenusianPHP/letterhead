<?php

namespace Letterhead;

use Surface\Contracts\Fonts\FontRegistry;
use Voyager\NutsAndBolts\ServiceProvider;

/** Registers every enabled face from config/letterhead.php on Surface's font registry. */
class LetterheadServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/letterhead.php', 'letterhead');
    }

    public function boot(): void
    {
        $this->publishes([
            dirname(__DIR__).'/config/letterhead.php' => $this->app->configPath('letterhead.php'),
        ], 'letterhead-config');

        $registry = $this->app->make(FontRegistry::class);
        foreach ($this->app->make('config')->get('letterhead.faces', []) as $slug => $entry) {
            if (! is_string($slug) || ! is_array($entry) || ! ($entry['enabled'] ?? false)) {
                continue;
            }
            $registry->extend($slug, (string) ($entry['class'] ?? ''));
        }
    }
}
