<?php

declare(strict_types=1);

namespace LifeOS\CPT;

final class Registrar
{
    public function register(): void
    {
        add_action('init', [$this, 'registerTypes']);
    }

    public function registerTypes(): void
    {
        // Custom post types are intentionally deferred to feature phases.
    }
}
