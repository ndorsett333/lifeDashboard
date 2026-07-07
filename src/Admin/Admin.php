<?php

declare(strict_types=1);

namespace LifeOS\Admin;

final class Admin
{
    private const MENU_SLUG = 'life-os';
    private const SUBMENU_SLUG = 'life-os-open-frontend';

    public function register(): void
    {
        add_action('admin_init', [$this, 'bootstrap']);
        add_action('admin_menu', [$this, 'registerMenu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueFrontendMenuLinkScript']);
    }

    public function bootstrap(): void
    {
        // Admin architecture hook point for future modules.
    }

    public function registerMenu(): void
    {
        add_menu_page(
            __('Life OS', 'life-os'),
            __('Life OS', 'life-os'),
            'manage_options',
            self::MENU_SLUG,
            [$this, 'renderPage'],
            'dashicons-chart-line',
            58
        );

        add_submenu_page(
            self::MENU_SLUG,
            __('Open Frontend', 'life-os'),
            __('Open Frontend', 'life-os'),
            'manage_options',
            self::SUBMENU_SLUG,
            [$this, 'renderFrontendPageShortcut']
        );
    }

    public function renderPage(): void
    {
        if (! current_user_can('manage_options')) {
            wp_die(esc_html__('You do not have permission to access this page.', 'life-os'));
        }

        echo '<div class="wrap life-os-admin-page">';
        echo '<h1>' . esc_html__('Life OS', 'life-os') . '</h1>';
        echo '<p>' . esc_html__('Life OS admin area is ready. Feature modules will be added iteratively.', 'life-os') . '</p>';
        echo '</div>';
    }

    public function renderFrontendPageShortcut(): void
    {
        if (! current_user_can('manage_options')) {
            wp_die(esc_html__('You do not have permission to access this page.', 'life-os'));
        }

        $url = $this->frontendUrl();

        echo '<div class="wrap life-os-admin-page">';
        echo '<h1>' . esc_html__('Open Frontend', 'life-os') . '</h1>';
        echo '<p>' . esc_html__('This shortcut opens the Life OS frontend in a new tab.', 'life-os') . '</p>';
        echo '<p><a class="button button-primary" href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer">' . esc_html__('Open Life OS Frontend', 'life-os') . '</a></p>';
        echo '</div>';
    }

    private function frontendUrl(): string
    {
        return home_url('/life-os/');
    }

    public function enqueueFrontendMenuLinkScript(string $hookSuffix): void
    {
        if (! current_user_can('manage_options')) {
            return;
        }

        wp_enqueue_script(
            'life-os-admin-menu-link',
            LIFE_OS_URL . 'assets/js/admin-menu-link.js',
            [],
            LIFE_OS_VERSION,
            true
        );

        wp_localize_script(
            'life-os-admin-menu-link',
            'lifeOsAdminMenuLink',
            [
                'frontendUrl' => esc_url_raw($this->frontendUrl()),
                'submenuText'  => __('Open Frontend', 'life-os'),
                'parentId'     => 'toplevel_page_' . self::MENU_SLUG,
                'menuSlug'     => self::MENU_SLUG,
            ]
        );
    }
}
