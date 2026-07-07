<?php

declare(strict_types=1);

namespace LifeOS\Admin;

final class Admin
{
    public function register(): void
    {
        add_action('admin_init', [$this, 'bootstrap']);
    }

    public function bootstrap(): void
    {
        // Admin architecture hook point for future modules.
    }
}
