<?php

declare(strict_types=1);

namespace LifeOS\Frontend;

final class Frontend
{
    public function register(): void
    {
        add_action('wp', [$this, 'bootstrap']);
    }

    public function bootstrap(): void
    {
        // Frontend architecture hook point for future SPA wiring.
    }
}
