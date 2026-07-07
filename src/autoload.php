<?php

declare(strict_types=1);

/**
 * Lightweight PSR-4 autoloader fallback when Composer is unavailable.
 */

spl_autoload_register(
    static function (string $class): void {
        $prefix = 'LifeOS\\';

        if (0 !== strpos($class, $prefix)) {
            return;
        }

        $relative = substr($class, strlen($prefix));

        if (false === $relative || '' === $relative) {
            return;
        }

        $path = LIFE_OS_PATH . 'src/' . str_replace('\\', DIRECTORY_SEPARATOR, $relative) . '.php';

        if (file_exists($path)) {
            require_once $path;
        }
    }
);
