<?php

declare(strict_types=1);

namespace LifeOS\REST;

use WP_REST_Request;
use WP_REST_Response;

final class Routes
{
    private const NAMESPACE = 'life-os/v1';

    public function register(): void
    {
        add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    public function registerRoutes(): void
    {
        register_rest_route(
            self::NAMESPACE,
            '/health',
            [
                'methods'             => 'GET',
                'permission_callback' => '__return_true',
                'callback'            => [$this, 'health'],
            ]
        );
    }

    public function health(WP_REST_Request $request): WP_REST_Response
    {
        unset($request);

        return new WP_REST_Response(
            [
                'plugin'  => 'life-os',
                'status'  => 'ok',
                'version' => LIFE_OS_VERSION,
            ],
            200
        );
    }
}
