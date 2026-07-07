<?php
/**
 * Plugin Name: Life OS
 * Description: A personal operating system scaffold for WordPress.
 * Version: 0.1.0
 * Requires at least: 6.5
 * Requires PHP: 8.2
 * Author: Life OS
 * Text Domain: life-os
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

define('LIFE_OS_VERSION', '0.1.0');
define('LIFE_OS_FILE', __FILE__);
define('LIFE_OS_PATH', plugin_dir_path(__FILE__));
define('LIFE_OS_URL', plugin_dir_url(__FILE__));

$life_os_autoloader = LIFE_OS_PATH . 'vendor/autoload.php';
$life_os_fallback   = LIFE_OS_PATH . 'src/autoload.php';

if (file_exists($life_os_autoloader)) {
    require_once $life_os_autoloader;
} elseif (file_exists($life_os_fallback)) {
    require_once $life_os_fallback;
} else {
    add_action('admin_notices', static function (): void {
        if (! current_user_can('activate_plugins')) {
            return;
        }

        echo '<div class="notice notice-error"><p>';
        echo esc_html__('Life OS autoload files are missing. Reinstall the plugin files.', 'life-os');
        echo '</p></div>';
    });

    return;
}

register_activation_hook(__FILE__, [\LifeOS\Lifecycle\Activator::class, 'activate']);
register_deactivation_hook(__FILE__, [\LifeOS\Lifecycle\Deactivator::class, 'deactivate']);

if (! function_exists('life_os')) {
    /**
     * Returns the bootstrapped plugin instance.
     */
    function life_os(): \LifeOS\Plugin {
        static $plugin = null;

        if (null === $plugin) {
            $container = new \LifeOS\Container();
            $plugin    = new \LifeOS\Plugin($container);
        }

        return $plugin;
    }
}

life_os()->boot();
