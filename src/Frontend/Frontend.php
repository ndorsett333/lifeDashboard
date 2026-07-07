<?php

declare(strict_types=1);

namespace LifeOS\Frontend;

final class Frontend
{
    private const QUERY_VAR = 'life_os_frontend';
    private const ROUTE     = 'life-os';

    public function register(): void
    {
        add_action('init', [$this, 'registerRewriteRules']);
        add_filter('query_vars', [$this, 'registerQueryVars']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
        add_action('template_redirect', [$this, 'maybeRenderPage']);
    }

    public function registerRewriteRules(): void
    {
        add_rewrite_rule(
            '^' . self::ROUTE . '/?$',
            'index.php?' . self::QUERY_VAR . '=1',
            'top'
        );
    }

    /**
     * @param array<int, string> $queryVars
     *
     * @return array<int, string>
     */
    public function registerQueryVars(array $queryVars): array
    {
        $queryVars[] = self::QUERY_VAR;

        return $queryVars;
    }

    public function enqueueAssets(): void
    {
        if (! $this->isFrontendPageRequest() || ! current_user_can('manage_options')) {
            return;
        }

        wp_enqueue_style('life-os-frontend');
        wp_enqueue_script('life-os-frontend');
    }

    public function maybeRenderPage(): void
    {
        if (! $this->isFrontendPageRequest()) {
            return;
        }

        if (! current_user_can('manage_options')) {
            wp_die(
                esc_html__('You do not have permission to access Life OS.', 'life-os'),
                esc_html__('Access denied', 'life-os'),
                ['response' => 403]
            );
        }

        $template = LIFE_OS_PATH . 'templates/frontend-dashboard.php';

        if (! file_exists($template)) {
            wp_die(
                esc_html__('Life OS frontend template is missing.', 'life-os'),
                esc_html__('Template missing', 'life-os'),
                ['response' => 500]
            );
        }

        status_header(200);
        include $template;
        exit;
    }

    private function isFrontendPageRequest(): bool
    {
        return '1' === (string) get_query_var(self::QUERY_VAR, '');
    }
}
