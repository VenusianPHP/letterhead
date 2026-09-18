<?php

use Letterhead\FreeSans\FreeSans9Pt;
use Letterhead\HelvB\HelvB12;
use Letterhead\LetterheadServiceProvider;
use Letterhead\Logisoso\Logisoso16;
use Surface\Contracts\Fonts\FontRegistry;
use Surface\Contracts\Fonts\GFXFont;

test('boot registers every enabled face on the registry and none of the disabled ones', function () {
    $registry = new class implements FontRegistry {
        /** @var array<string, string> */
        public array $extended = [];

        public function extend(string $slug, string $class): static
        {
            $this->extended[$slug] = $class;

            return $this;
        }

        public function face(?string $slug = null): GFXFont
        {
            throw new LogicException('not used');
        }

        public function has(string $slug): bool
        {
            return isset($this->extended[$slug]);
        }

        public function slugs(): array
        {
            return array_keys($this->extended);
        }

        public function defaultSlug(): string
        {
            return 'classic';
        }
    };
    $config = new class {
        public function get(string $key, mixed $default = null): mixed
        {
            return $key === 'letterhead.faces' ? (require dirname(__DIR__, 2).'/config/letterhead.php')['faces'] : $default;
        }
    };
    $app = new class($registry, $config) {
        public function __construct(private object $registry, private object $config) {}

        public function make(string $abstract): mixed
        {
            return match ($abstract) {
                FontRegistry::class => $this->registry,
                'config' => $this->config,
            };
        }

        public function configPath(string $path = ''): string
        {
            return "/config/{$path}";
        }
    };

    (new LetterheadServiceProvider($app))->boot();

    expect($registry->extended)->toBe([
        'free-sans-9pt' => FreeSans9Pt::class,
        'helvb-12' => HelvB12::class,
        'logisoso-16' => Logisoso16::class,
    ]);
});
