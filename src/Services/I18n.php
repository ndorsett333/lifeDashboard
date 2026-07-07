<?php

declare(strict_types=1);

namespace LifeOS\Services;

final class I18n
{
    public function register(): void
    {
        add_action('init', [$this, 'loadTextDomain']);
    }

    public function loadTextDomain(): void
    {
        load_plugin_textdomain(
            'life-os',
            false,
            dirname(plugin_basename(LIFE_OS_FILE)) . '/languages'
        );
    }
}
