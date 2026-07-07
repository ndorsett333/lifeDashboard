<?php

declare(strict_types=1);

namespace LifeOS\Services;

final class Assets
{
    public function register(): void
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdmin']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontend']);
    }

    public function enqueueAdmin(): void
    {
        wp_register_style(
            'life-os-admin',
            LIFE_OS_URL . 'assets/css/life-os.css',
            [],
            LIFE_OS_VERSION
        );

        wp_register_script(
            'life-os-admin',
            LIFE_OS_URL . 'assets/js/life-os.js',
            [],
            LIFE_OS_VERSION,
            true
        );
    }

    public function enqueueFrontend(): void
    {
        wp_register_style(
            'life-os-frontend',
            LIFE_OS_URL . 'assets/css/life-os.css',
            [],
            LIFE_OS_VERSION
        );

        wp_register_script(
            'life-os-frontend',
            LIFE_OS_URL . 'assets/js/life-os.js',
            [],
            LIFE_OS_VERSION,
            true
        );
    }
}
